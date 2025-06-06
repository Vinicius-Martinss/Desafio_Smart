<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContratoController extends Controller
{
    /**
     * Exibe o formulário para gerar contrato,
     * enviando a lista de planos do usuário.
     */
    public function form(Request $request)
    {
        $user = $request->user();

        // Pega todos os planos desse usuário/provedor
        $planos = $user->planos()->orderBy('nome')->get();
        if ($planos->isEmpty()) {
            abort(404, 'Você ainda não cadastrou nenhum plano.');
        }

        // Passa $user e $planos (Collection) para a view
        return view('contratos.form', compact('user', 'planos'));
    }

    /**
     * Recebe o plano selecionado + datas, e gera o .docx.
     */
    public function gerar(Request $request)
    {
        // 1. Validação: agora inclui o campo 'plano_id'
        $request->validate([
            'plano_id'     => 'required|exists:planos,id',
            'data_inicio'  => 'required|date',
            'data_termino' => 'required|date|after_or_equal:data_inicio',
        ]);

        // 2. Obter usuário e buscar o plano específico
        $user = $request->user();
        $plano = $user->planos()->where('id', $request->input('plano_id'))->first();
        if (! $plano) {
            abort(404, 'Plano não encontrado para este provedor.');
        }

        // 3. Formatar datas e valor do contrato
        $dataInicio    = \Carbon\Carbon::parse($request->input('data_inicio'))->format('d/m/Y');
        $dataTermino   = \Carbon\Carbon::parse($request->input('data_termino'))->format('d/m/Y');
        $valorContrato = number_format($plano->preco, 2, ',', '.');

        // 4. Dados do provedor (empresarial)
        $nomeEmpresa = $user->nome_empresa; // sem fallback para nome de usuário
        $cpf         = $user->cpf;
        $cidade      = $user->cidade ?? 'Cidade não informada';

        // 5. Iniciar PHPWord, configurar fonte…
        $phpWord = new \PhpOffice\PhpWord\PhpWord();
        $phpWord->setDefaultFontName('Arial');
        $phpWord->setDefaultFontSize(12);

        // 6. Seção com margens
        $section = $phpWord->addSection([
            'marginLeft'   => 600,
            'marginRight'  => 600,
            'marginTop'    => 600,
            'marginBottom' => 600,
        ]);

        // 7. Título
        $section->addText(
            'CONTRATO DE PRESTAÇÃO DE SERVIÇOS',
            ['bold' => true, 'size' => 16],
            ['alignment' => 'center', 'spaceAfter' => 240]
        );

        // 8. Identificação das partes com CPF
        $section->addText(
            "Pelo presente instrumento particular, de um lado, a empresa “{$nomeEmpresa}”, inscrita no CPF sob o nº {$cpf}, com sede em {$cidade}, doravante denominada CONTRATADA, e de outro lado o CONTRATANTE, qualificado na proposta ou documento específico, ajustam o presente Contrato de Prestação de Serviços, mediante as cláusulas e condições abaixo:"
        );

        // 9. Cláusula 1 – Objeto (agora usando o $plano->nome selecionado)
        $section->addTextBreak(1);
        $section->addText('Cláusula 1ª – Objeto:', ['bold' => true]);
        $section->addText("A CONTRATADA prestará ao CONTRATANTE o serviço de “{$plano->nome}”.");

        // 10. Cláusula 2 – Vigência
        $section->addTextBreak(1);
        $section->addText('Cláusula 2ª – Vigência:', ['bold' => true]);
        $section->addText("O presente contrato terá início em {$dataInicio} e término em {$dataTermino}.");

        // 11. Cláusula 3 – Valor do contrato
        $section->addTextBreak(1);
        $section->addText('Cláusula 3ª – Valor do Contrato e Forma de Pagamento:', ['bold' => true]);
        $section->addText("O valor total do presente contrato é de R$ {$valorContrato}.");

        // 12. Cláusula 4 – Obrigações
        $section->addTextBreak(1);
        $section->addText('Cláusula 4ª – Obrigações das Partes:', ['bold' => true]);
        $section->addText('4.1 – Obrigações da CONTRATADA:');
        $section->addListItem('Prestar os serviços conforme especificado no plano contratado.', 0);
        $section->addListItem('Manter padrão de qualidade e atendimento.', 0);
        $section->addText('4.2 – Obrigações do CONTRATANTE:');
        $section->addListItem('Efetuar o pagamento na forma e prazos ajustados.', 0);
        $section->addListItem('Fornecer todas as informações necessárias para a execução dos serviços.', 0);

        // 13. Cláusula 5 – Disposições gerais
        $section->addTextBreak(1);
        $section->addText('Cláusula 5ª – Disposições Gerais:', ['bold' => true]);
        $section->addText('Qualquer alteração neste contrato somente terá validade se formalizada por escrito e assinada por ambas as partes.');

        // 14. Espaço para assinaturas
        $section->addTextBreak(2);
        $section->addText('______________________________________________', ['size' => 12], ['alignment' => 'left']);
        $section->addText('CONTRATADA', ['size' => 12], ['alignment' => 'left']);
        $section->addTextBreak(2);
        $section->addText('______________________________________________', ['size' => 12], ['alignment' => 'right']);
        $section->addText('CONTRATANTE', ['size' => 12], ['alignment' => 'right']);

        // 15. Preparar nome e caminho do arquivo
        $fileName = 'contrato_' . $user->id . '_' . now()->timestamp . '.docx';
        $dir      = storage_path('app/contratos');
        $filePath = $dir . '/' . $fileName;

        // 16. Criar pasta se não existir
        if (! File::exists($dir)) {
            File::makeDirectory($dir, 0755, true);
        }

        // 17. Salvar o .docx
        $writer = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
        $writer->save($filePath);

        // 18. Forçar download e apagar após envio
        return response()->download($filePath)->deleteFileAfterSend(true);
    }
}
