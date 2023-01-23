<?php

class Rijscholen extends Controller
{
    private $rijschoolModel;

    public function __construct()
    {
        $this->rijschoolModel = $this->model('Rijschool');
    }

    public function index()
    {
        $result = $this->rijschoolModel->getInstrecteur();
        $rows = '';
        foreach ($result as $info) {
            $rows .= "
            <tr>
            <td>$info->Voornaam</td>
            <td>$info->Tussenvoegsel</td>
            <td>$info->Achternaam</td>
            <td>$info->Mobiel</td>
            <td>$info->DatumInDienst</td>
            <td>$info->AantalSterren</td>
            <td><a href='" . URLROOT . "/rijschool/readVoertuig'><img src='" . URLROOT . "/img/b_help.png' alt='topic'></a></td>
            </tr>";;
        }
        $data = [
            'title' => "Instrecteur in dienst",
            'rows' => $rows,
            'aantalInstrecteur' => '5'
        ];
        $this->view('rijschool/index', $data);
    }
}
