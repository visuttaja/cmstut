<?php
/*$testing = new Testaa_foreach();
if (!empty($_POST['submit'])) {
    // validate
    $testing->handle_email();

    $testing->handle_password();
}
else {

    $testing->yleisLomake();

}*/

class yleislomakeCO extends Admin_Controller
{
    //public $data = array();

    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {

        $title = "hahaa";
        $this->data['dynstring'] = $this->yleisLomake('admin/userCO/login');

        $this->kasaaPerusSivuExp($title);



    }



    public function yleisLomake($action=null)
    {
       if($action==null)
        $director = $_SERVER['PHP_SELF'];
        else
            $director =$action;

        $f_arr = Array();
        $f_arr['label1'] = 'Sähköposti';
        $f_arr['type1'] = 'text';
        $f_arr['name1'] = 'email';
        $f_arr['value1'] = 'bon.scott@acdc.com';

        $f_arr['label2'] = 'Salasana';
        $f_arr['type2'] = 'text';
        $f_arr['name2'] = 'password';
        $f_arr['value2'] = '';

        $f_arr['label3'] = 'Nimi';
        $f_arr['type3'] = 'text';
        $f_arr['name3'] = 'nimi';
        $f_arr['value3'] = '';


        //$base = config_item('base_url') . 'index.php' . '/';
        //$subaction = 'salat/formhandlerSkeleton';
        //$this->action_arr['actor'] = $base . $subaction;


        $act_arr['type1'] = 'submit';
        $act_arr['name1'] = 'login';
        $act_arr['value1'] = 'Kirjaudu';

        $act_arr['type2'] = 'submit';
        $act_arr['name2'] = 'logout';
        $act_arr['value2'] = 'Poistu';

        $act_arr['type3'] = 'submit';
        $act_arr['name3'] = 'register';
        $act_arr['value3'] = 'Rekisteröidy';


        //$this->load->view('login5VI', $this->action_arr);
        $form = $this->buildPostForm($f_arr,$act_arr,$director);
        return $form;
    }

    public function buildPostForm($box_array,$btn_array,$director)
    {

$total='';
        $field_litania = implode("~~~",$box_array);
        $f_ar = explode("~~~",$field_litania);


        $total.= '<form action='.'"'.$director.'" '.'method='."post>"."\n";
        //echo   '<form action='.'"'.$director.'" '.'method='."post>"."\n";
        $total.= '<table>'."\n";
        //echo   '<table>'."\n";
        $flen=count($f_ar);


        for($i=0;$i<$flen;) {
            $rowstart1='<tr>';
            $datastart1='<td>';
            $var_label=$f_ar[$i++];
            $dataend1='</td>';
            $datastart2='<td>';
            $tagstart =  '<input type=';
            $sQ0A ='"';
            $var_type = $f_ar[$i++];
            $sQ0B ='"'.' ';
            $namestr ='name=';
            $sQ1A ='"';
            $var_name=$f_ar[$i++];
            $sQ1B ='"'.' ';
             $valstr='value=';
            $sQ2A ='"';
            $var_value=$f_ar[$i++];
            $sQ2B ='"'.' ';
            $endtag='>';
            $dataend2='</td>';
            $rowend1='</tr>'."\n";
            $str_one_box_line =
                $rowstart1.
                $datastart1.
             $var_label.$dataend1.$datastart2.$tagstart.$sQ0A.$var_type.$sQ0B.
             $namestr.$sQ1A.$var_name.$sQ1B.$valstr.$sQ2A.$var_value.$sQ2B.$endtag.
            $dataend2.
            $rowend1;
            //echo '<input type='.'"'.'text'.'"'.'name='.'"'.$value.'"'.'><br>';

            //echo "{$value} {$key}";
            $total.=$str_one_box_line;
            //echo $str_one_box_line;
        }

        $nappi_litania = implode("~~~",$btn_array);
        $btn_ar = explode("~~~",$nappi_litania);

        $actlen=count($btn_ar);

        $rowstart1='<tr>';
        $total.=$rowstart1;
        echo $rowstart1;
        for($j=0;$j<$actlen;) {

           // $var_label=$f_ar[$j++];

            $datastart1='<td>';
            $tagstart =  '<input type=';
            $sQ0A ='"';
            $var_type = $btn_ar[$j++];
            $sQ0B ='"'.' ';
            $namestr ='name=';
            $sQ1A ='"';
            $var_name=$btn_ar[$j++];
            $sQ1B ='"'.' ';
            $valstr='value=';
            $sQ2A ='"';
            $var_value=$btn_ar[$j++];
            $sQ2B ='"'.' ';
            $endtag='>';
            $dataend1='</td>'."\n";


            $str_one_btn =

            $datastart1.
            $tagstart.$sQ0A.$var_type.$sQ0B.
            $namestr.$sQ1A.$var_name.$sQ1B.$valstr.$sQ2A.$var_value.$sQ2B.$endtag.
            $dataend1;

            //echo '<input type='.'"'.'text'.'"'.'name='.'"'.$value.'"'.'><br>';

            //echo "{$value} {$key}";
            $total.=$str_one_btn;
            //echo $str_one_btn;
        }
        $rowend1='</tr>'."\n";
        $total.=$rowend1;
        //echo $rowend1;
        $total.='</table>'."\n";
        $total.='</form>';
        //echo   '</table>'."\n";
        //echo   '</form>';
return $total;

    }
//********************************
public function handle_email(){
var_dump("dfgsdgsd");

}
    public function handle_password(){


    }
}