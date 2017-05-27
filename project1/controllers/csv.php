<?php
require(MODEL . 'csv.php');

class Controller_CSV {
    public $csv_model;
    public $csv_object;
    public $stock;

    public function __construct() {
      if (isset($_GET['stock'])) {
        $this->stock = $_GET['stock'];
        $csv_model = new CSV_Model($this->stock);
        $this->csv_object = $csv_model->csv_store; 
      }
    }

    public function invalid_entry() {
      return $this->csv_object[1] === 'N/A' ? true : false;
    }

    public function display_formatted_data() {
      if ($this->invalid_entry($this->csv_object)) {

        echo '<h1 style="color:red;font-weight:bold;">No Stock Found. Please Try Your Search Again.</h1>';
        
      } else {

          for ($i=0; $i < count($this->csv_object); $i++) {
            echo '<td>' . $this->csv_object[$i] . '</td>';
          }

      }
    }
}
?>