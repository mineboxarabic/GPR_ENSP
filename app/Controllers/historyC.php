<?php
class historyC extends Controller
{
    public function main()
    {
        echo "<script>console.log('historyC');</script>";
        $sortBy = "id_emprunt";
        $sortOrder = "DESC";
        if(isset($_POST['id']) && isset($_POST['header']))
        {
            $sortBy = $_POST['id'];
            $sortOrder = $_POST['header'];
        }
        echo "<script>console.log('sortBy: ".$sortBy."');</script>";
        $data = [
            'title' => 'history'. $sortOrder,
        ];
        $this->view('Template/inc.NavTS', $data).
        $this->view('history').
        $this->view('Template/inc.Footer');
    }
}