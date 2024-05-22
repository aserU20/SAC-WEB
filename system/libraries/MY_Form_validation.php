<!-- class MY_Form_validation extends CI_Form_validation {

    public function __construct($rules = array())
    {
        parent::__construct($rules);
    }


    public function valid_date($date, $format = 'd/m/Y H:i:s')
    {
        <!-- METODO 1 -->
        <!-- $d = DateTime::createFromFormat('Y-m-d', $date);
        return $d && $d->format('Y-m-d') === $date; -->

        <!-- METODO 2 -->
        <!-- $parts = explode("/", $date);
        if (count($parts) == 3) {      
            if (checkdate($parts[1], $parts[0], $parts[2]))
            {
                return TRUE;
            }
        } -->

        <!-- METODO 3 -->
        <!-- $d = DateTime::createFromFormat($format, $date);
        return $d && $d->format($format) == $date; -->
      
    }
} -->