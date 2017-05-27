<?php  
  class CSV_Model {

    public $csv_store;
    public $path;
    
    public function __construct($stock){
      $this->url = "http://download.finance.yahoo.com/d/quotes.csv?s=" . htmlspecialchars($stock) . "&f=sl1d1t1c1ohgv&e=.csv";
      $this->csv_store = fgetcsv(fopen($this->url, "r"));
    }

  }
?>