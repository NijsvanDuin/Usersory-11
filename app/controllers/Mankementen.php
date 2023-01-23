<?php

class Mankementen extends Controller
{

    private $MankementenModel;


    public function __construct()
    {
        $this->MankementenModel = $this->model('Mankement');
    }

    public function index()
    {
        $result = $this->MankementenModel->getMankement();
        // if ($result) {
        //     $instrecteurNaam = $result[0]->INNA;
        // } else {
        //     $instrecteurNaam = '';
        // }
        // var_dump($result);
        $rows = '';
        $first = '';
        foreach ($result as $info) {
            $rows .= "
            <tr>
            <td>$info->Datum</td>
            <td>$info->Mankement</td>
            </tr>";
            $first = " Auto van Instructeur: $info->Naam <br>
                        Email: $info->Email <br>
                        Kenteken: $info->Kenteken <br>
                        Type: $info->Type <br>
            ";
        }

        $data = [
            'title' => "Overzicht Mankementen",
            'rows' => $rows,
            'first' => $first
        ];
        $this->view('mankement/index', $data);
    }


    public function addMankement($InstrecteurId = 2)
    {
        $data = [
            'title' => 'Invoegen Mankement',
            'InstrecteurId' => $InstrecteurId,
            'Errors' => ''
        ];


        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // var_dump($_POST);
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            $data = [
                'title' => 'Invoegen Mankementen',
                'InstrecteurId' => 2,
                'Errors' => '',
            ];

            if (empty($data['Errors'])) {
                $result = $this->MankementenModel->addMankement($_POST);
                if ($result) {
                    echo "<p>Het nieuwe mankement is toegevoegd</p>";
                } else {
                    echo "<p>Het nieuwe mankement is niet toegevoegd, probeer het opnieuw</p>";
                }
                header('Refresh:5; url=' . URLROOT . '/mankementen/index/');
            } else {
                header('refresh:3; url=' . URLROOT . '/mankement/addMankement/2');
            }
        }
        $this->view('mankement/addMankement', $data);
    }
}
