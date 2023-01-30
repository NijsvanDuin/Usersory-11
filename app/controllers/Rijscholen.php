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
            <td><a href='" . URLROOT . "/rijscholen/readVoertuig/$info->Id'><img src='" . URLROOT . "/img/b_help.png' alt='topic'></a></td>
            </tr>";;
        }
        $data = [
            'title' => "Instrecteur in dienst",
            'rows' => $rows,
            'aantalInstrecteur' => '5'
        ];
        $this->view('rijschool/index', $data);
    }

    public function readVoertuig($id)
    {
        $istrecteur = $this->rijschoolModel->getInstrecteurById($id);
        $voertuigen = $this->rijschoolModel->getAutoById($id);
        $rows = '';
        var_dump($voertuigen);
        if (empty($voertuigen)) {
            $rows = "Op dit moment heeft de instrecteur geen voertuigen in gebruik.";
        } else {
            foreach ($voertuigen as $info) {
                $rows .= "
                <tr>
                <td>$info->TypeVoertuig</td>
                <td>$info->Type</td>
                <td>$info->Kenteken</td>
                <td>$info->Bouwjaar</td>
                <td>$info->Brandstof</td>
                <td>$info->Rijbewijscategorie</td>
                </tr>";;
            }
        }

        $data = [
            'title' => "Door Instrecteur gebruikte voertuigen",
            'voornaam' => $istrecteur->Voornaam,
            'tussenvoegsel' => $istrecteur->Tussenvoegsel,
            'achternaam' => $istrecteur->Achternaam,
            'datumInDienst' => $istrecteur->DatumInDienst,
            'aantalSterren' => $istrecteur->AantalSterren,
            'instucteurId' => $istrecteur->Id,
            'rows' => $rows
        ];
        $this->view('rijschool/readVoertuig', $data);
    }
    public function addVoertuig($id)
    {
        $istrecteur = $this->rijschoolModel->getInstrecteurById($id);
        var_dump($istrecteur);
        $data = [
            'title' => "Alle beschikbaare voeruigen",
            'voornaam' => $istrecteur->Voornaam,
            'tussenvoegsel' => $istrecteur->Tussenvoegsel,
            'achternaam' => $istrecteur->Achternaam,
            'datumInDienst' => $istrecteur->DatumInDienst,
            'aantalSterren' => $istrecteur->AantalSterren
        ];
        $this->view('rijschool/addVoertuig', $data);
    }
}
