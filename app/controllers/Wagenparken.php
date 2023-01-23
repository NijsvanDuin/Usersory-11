<?php

class Wagenparken extends Controller
{

    private $wagenparkModel;


    public function __construct()
    {
        $this->wagenparkModel = $this->model('Wagenpark');
    }

    public function index()
    {
        $result = $this->wagenparkModel->getKmstand();
        // if ($result) {
        //     $instrecteurNaam = $result[0]->INNA;
        // } else {
        //     $instrecteurNaam = '';
        // }
        // var_dump($result);
        $rows = '';
        foreach ($result as $info) {
            $rows .= "
            <tr>
            <td>$info->Type</td>
            <td>$info->Kenteken</td>
            <td><a href='" . URLROOT . "/wagenparken/addKmstand/{$info->id}'><img src='" . URLROOT . "/img/b_report.png' alt='topic'></a></td>
            </tr>";
        }

        $data = [
            'title' => "Invoegen km stand",
            'rows' => $rows
        ];
        $this->view('wagenpark/index', $data);
    }


    public function addKmstand($AutoId = NULL)
    {
        $data = [
            'title' => 'Invoegen Kilometerstand',
            'AutoId' => $AutoId,
            'kmstandErrors' => ''
        ];


        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // var_dump($_POST);
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            $data = [
                'title' => 'Invoegen Kilometerstand',
                'AutoId' => $_POST['AutoId'],
                'kmstandErrors' => '',
            ];

            if (empty($data['kmstandErrors'])) {
                $result = $this->wagenparkModel->addKmstand($_POST);
                if ($result) {
                    echo "<p>De nieuwe kilometerstand is toegevoegd</p>";
                } else {
                    echo "<p>De nieuwe kilometerstand is niet toegevoegd, probeer het opnieuw</p>";
                }
                header('Refresh:5; url=' . URLROOT . '/wagenparken/index/');
            } else {
                header('refresh:3; url=' . URLROOT . '/wagenpark/addKmstand/' . $data['AutoId']);
            }
        }
        $this->view('wagenpark/addKmstand', $data);
    }
}
