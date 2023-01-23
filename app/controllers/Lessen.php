<?php
class Lessen extends Controller
{

    public function __construct()
    {
        $this->lessonModel = $this->model('Les');
    }

    public function index()
    {
        $result = $this->lessonModel->getLessons();
        if ($result) {
            $instrecteurNaam = $result[0]->INNA;
        } else {
            $instrecteurNaam = '';
        }
        // var_dump($result);
        $rows = '';
        foreach ($result as $info) {
            $d = new DateTimeImmutable($info->Datum, new DateTimeZone('Europe/Amsterdam'));
            $rows .= "<tr>
                        <td>{$d->format('d-m-Y')}</td>
                        <td>{$d->format('H:i')}</td>
                        <td>$info->LENA</td>
                        <td><a href='" . URLROOT . "/Lessen/opmerking/{$info->Id}'><img src='" . URLROOT . "/img/b_help.png' alt='questionmark'></a></td>
                        <td><a href='" . URLROOT . "/Lessen/topicslesson/{$info->Id}'><img src='" . URLROOT . "/img/b_report.png' alt='topic'></a></td>
                    </tr>";
        }

        $data = [
            'title' => "Overzicht lessen",
            'rows' => $rows,
            'instrecteurNaam' => $instrecteurNaam
        ];
        $this->view('lessen/index', $data);
    }

    public function topicsLesson($lesId)
    {
        $result = $this->lessonModel->getTopicsLesson($lesId);
        if ($result) {
            $d = new DateTimeImmutable($result[0]->Datum, new DateTimeZone('Europe/Amsterdam'));
            $date = $d->format('d-m-Y');
            $time = $d->format('H:i');
        } else {
            $date = '';
            $time = '';
        }
        // var_dump($result);
        $rows = '';
        foreach ($result as $topic) {
            $rows .= "<tr>
                        <td>$topic->Onderwerp</td>
                    </tr>";
        }
        $data = [
            'title' => 'Overzicht onderwerpen',
            'rows' => $rows,
            'lesId' => $lesId,
            'date' => $date,
            'time' => $time
        ];
        $this->view('lessen/topicsLesson', $data);
    }

    public function addTopic($lesId = NULL)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //var_dump($_POST);
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            $result = $this->lessonModel->addTopic($_POST);
            if ($result) {
                echo "<p>Onderwerp is sucsessvol toegevoegd</p>";
            } else {
                echo "<p>Onderwerp is niet toegevoegd</p>";
            }
            header('Refresh: 3; url= ' . URLROOT . '/lessen/index');
        }
        $data = [
            'title' => 'Onderwerp toevoegen',
            'lesId' => $lesId
        ];
        $this->view('lessen/addTopic', $data);
    }
    public function opmerking($lesId = NULL)
    {
        if (!$lesId) {
            header("Location:" . URLROOT . "/lessen/index");
        }

        $les = $this->lessonModel->opmerking($lesId);

        $rows = '';

        foreach ($les as $value) {
            $rows .= "<tr>
                  <td>$value->id</td>
                  <td>$value->Datum</td>
                  <td>$value->Naam</td>
                  <td>$value->Opmerking</td>
              </tr>";
        }

        $data = [
            'rows' => $rows,
            'title' => 'Opmerkingen',
            'lesId' => $lesId
        ];
        $this->view('lessen/opmerking', $data);
    }
    public function addOpmerking($lesId = NULL)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //var_dump($_POST);
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            $result = $this->lessonModel->addOpmerking($_POST);
            if ($result) {
                echo "<p>Opmerking is sucsessvol toegevoegd</p>";
            } else {
                echo "<p>Opmerking is niet toegevoegd</p>";
            }
            header('Refresh: 3; url= ' . URLROOT . '/lessen/index');
        }
        $data = [
            'title' => 'Opmerking toevoegen',
            'lesId' => $lesId
        ];
        $this->view('lessen/addOpmerking', $data);
    }
}
