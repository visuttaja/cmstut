<?php
/**
 * Created by PhpStorm.
 * User: Uranus
 * Date: 8.1.2017
 * Time: 13.44
 */


class SalatCO extends Admin_Controller
{


    public $arr_body = array();
    public $arr_ohje = array();
    public $action_arr = array();
    //
    public function __construct()
    {
        parent::__construct();
         //$arr_body = array();
    }


    public function index()
    {
$this->salaus();

    }




    public function salaus()
    {

ob_start();
//echo password_hash('Salasana1', PASSWORD_DEFAULT)."\n";
$options = [
  'cost' => 11
];
$hash = password_hash('Salasana1', PASSWORD_DEFAULT);
//$hash =  password_hash('Salasana1', PASSWORD_BCRYPT, $options)."\n";
echo $hash;
if(password_verify ( 'Salasana1' , $hash))
echo

'ok';

else 
echo 'not ok';

        $this->load->helper(array('form', 'url'));



        $this->data['meta_title'] = "Salasanoja!";

        $this->set_iconpath();

        $this->load->view("headstartVI", $this->data);
        $this->loadhead();
        $this->load->view("headendVI", $this->data);

        $this->load->view("bodystartVI");

        $this->kokoa_ohje();
        $this->pura_ohje();

        if (isset($_POST['password'])) {

            echo 'jaahas!' . "<br>" . $this->input->post('password') . " saatu" . "<br>";
           // $SALT = config_item('encryption_key');
            //echo "SALT on " . $SALT . "<br>";
            //echo "hash() funktiolle annettava merkkijono on" . $SALT . $this->input->post('passwort') . "<br>";
            $curpassw = $this->input->post('password');
            $this->sendform();
            $this->kryptatutSalasanatTauluun($curpassw);
        }


            else {

                $this->sendform();
                $this->load->view('expanderVI', $this->arr_body);
            }


        $this->load->view('expanderVI', $this->arr_body);//purkaa tauludatan sivuun
            $this->load->view("adminvi/components/bodyendVI");
            $this->load->view("adminvi/components/tuttailVI");
ob_end_flush();
    }
    public function kryptatutSalasanatTauluun($curpassw){

        array_push($this->arr_body, '<div>');
        array_push($this->arr_body, date('H:i:s Y-d-m') . "<br>");
        $salasana = $curpassw;
        if ($_POST['salt']!=='')
        $SALT =$_POST['salt'];
            else
                $SALT = config_item('encryption_key');




        array_push($this->arr_body, 'Hässittyjä  salasanoja sanalle:' . $salasana . "<br>");
        array_push($this->arr_body, 'SALT:' . $SALT . '<br>');

        $algos = hash_algos();
        array_push($this->arr_body,'Algoritmi <br>' );
        while ($ritminyt = current($algos)) {

            array_push($this->arr_body, '<b>'.
                "<span style ='font:15px/15px Arial,tahoma,sans-serif;color:#ff0000'> $ritminyt :</span>" . '</b>');
            $pwstring = hash($ritminyt, $SALT . $salasana);
            //echo key($algos).'<br />';
            array_push($this->arr_body, $pwstring . '<br />' . "\n");
            next($algos);
        }
        array_push($this->arr_body, '</div>');



    }
  /*
    public function hash($string)
    {
        return hash('sha512', config_item('encryption_key') . $string);


    }
*/
    public function sendform()
    {

        $this->load->helper('form');
        echo form_open();
        if (isset($_POST['password'])) {
            echo form_input('password', $_POST['password']);
        } else {
            echo form_input('password', 'SalasanaX');
        }

        if (isset($_POST['salt'])) {
            echo form_input('salt', $_POST['salt']);
        } else {
            echo form_input('salt', 'SALTX','dfygdh');
        }
        echo form_submit('submit', 'enter lähettää');

        echo '<i class="glyphicon glyphicon-thumbs-up"></i>';
        echo form_close();

    }


    public function iisiLomake($co_actor,$field1_val,$field2_val,$btnmsg)
    {

        $this->action_arr['field1_id'] = $field1_val;
        $this->action_arr['field2_id'] = $field2_val;
        $this->action_arr['field1_def'] = 'bon.scott@acdc.com';
        $this->action_arr['field2_def'] = 'hello';
        $this->action_arr['field1_lab'] = $field1_val;
        $this->action_arr['field2_lab'] = $field2_val;
        $this->action_arr['btnmsg'] = $btnmsg;
        $base = config_item('base_url') . 'index.php' . '/';
        $subaction = 'salat/formhandlerSkeleton';
        $this->action_arr['actor'] = $base . $subaction;

        $this->action_arr['actor'] = $co_actor;

        $this->load->view('login5VI', $this->action_arr);

    }

public function loadhead(){

    echo get_icon($this->data['iconpath']);
    echo get_warm_css();
    //echo getjquery();
    //echo getbootstrap();
    //echo get_tinymce();
   //echo get_sort_table();
    //echo get_jquery_gui_js();
    //echo get_jquery_gui_css();
    //$nst=get_nested_sortable();
    //echo get_datepicker_js();
    //echo get_datepicker_css();
    //echo get_cmstut_css();
    //echo $nst;
    //echo getfontawesome();
}
public function kokoa_ohje(){
    $this->prap('<h3>Salasanojen Synty ja Elo</h3>');
    $this->prap('Hash operaatiossa algoritmi tuottaa pitkän litanian käyttäjän salasanasta.'. "<br>");
    $this->prap('Saadusta hash-merkkijonosta ei voi millään algoritmilla päätellä salasanaa takaisin päin.'. "<br>");
    array_push($this->arr_ohje, 'Jos voisi, operaatiota kutsuttaisiin enkryptaukseksi ja dekryptaukseksi.'. "<br>");

    array_push($this->arr_ohje, 'SALTtauksessa hash-algoritmille annetaan salasanan lisäksi yksi tai useampi ekstra merkkijono. '. "<br>");
    array_push($this->arr_ohje, 'Tämä vaikeuttaa murretun salasanatietokannan hyväksikäyttöä, koska murtautujan olisi lisäksi päästävä salttauskoodin lähteelle.'. "<br>");
    array_push($this->arr_ohje, 'SALT-jono voi sijoittua salasanan ympärille miten tahansa;oikealle, vasemmalle ja niitä voi olla enemmänkin.'. "<br>");
    array_push($this->arr_ohje, 'Kirjautumistilanteessa yhdistelmä tarjotaan hash-algoritmille, ja saatua palautusta verrataan tietokannassa olevaaan litaniaan.'. "<br>");
    array_push($this->arr_ohje, 'SALT-järjestys on tässä yhteydessä näin: $pwstring = hash($ritminyt, $SALT . $salasana);');
	array_push($this->arr_ohje, '<br>JAVAN ja PHP:n synkronointi:');
	array_push($this->arr_ohje, '<br>JAVAN puolella seuraava kirjasto toimiii turvallisemmalla bcrypt algoritmilla;<br>');
	
     array_push($this->arr_ohje,"http://www.mindrot.org/projects/jBCrypt/<br>");
	 array_push($this->arr_ohje, 'Se toimii php:n kanssa kun alun hash-jonon salt-tunnuksen vaihtaa olemaan $2a kun se alunperin on phpssa $2y.<br> ');
	 array_push($this->arr_ohje, 'PHPssa on uusi BCRYPT-algoritmi password_hash.<br> 
	 Funktio ja tarkistus toimii seuraavasti:<br>+
	 
	 $hash = password_hash(\'Salasana1\', PASSWORD_DEFAULT);<br>
//$hash =  password_hash(\'Salasana1\', PASSWORD_BCRYPT, $options);<br>
if(password_verify ( \'Salasana1\' , $hash))
echo "salasana on oikein"
	 ');
	 


}
public function pura_ohje(){

    $this->load->view('arrexpandVI', $this->arr_ohje);//purkaa tauludatan sivuun

}
//***************************
public  function prap($str){

array_push($this->arr_ohje,$str);

}
}