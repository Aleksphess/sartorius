<?php
/*
 *  Новости
 * */

class admin_news extends AdminTable
{
	
    public $TABLE           = 'news';
    public $IMG_SIZE        = 223; // макс высота 
    public $IMG_VSIZE       = 140; 
    public $IMG_RESIZE_TYPE = 1; //рeсайз по высоте
    public $IMG_BIG_SIZE    = 740;
    public $IMG_BIG_VSIZE   = 480;
    public $IMG_NUM         = 1;
    public $ECHO_NAME       = 'title';
    public $SORT            = 'custom_date DESC, sort';
    public $FIELD_UNDER     = "cat_id";
    public $NAME            = "Новости";
    public $NAME2           = "новость";

    public $MULTI_LANG      = 1;

    function __construct()
    {
        $this->fld[] = new Field("alias","Alias (геренерируеться, если не заполнен)",1);
        $this->fld[] = new Field("status","Опубликовать",6,array('showInList'=>1, 'editInList'=>1));
        $this->fld[] = new Field("custom_date","Дата публикации",13,array('showInList'=>1));

        $this->fld[] = new Field("title","Заголовок",1, array('multiLang'=>1));
        $this->fld[] = new Field("cat_id","Находится в разделе",9, array(
            'showInList'=>0, 'editInList'=>0, 'valsFromTable'=>'news_categories', 'valsFromCategory'=>-1,
            'valsEchoField'=>'title'));
        $this->fld[] = new Field("description","Короткое описание",2, array('multiLang'=>1));
        $this->fld[] = new Field("text","Текст",2, array('multiLang'=>1));
        $this->fld[] = new Field("sort","SORT",4);
        $this->fld[] = new Field("email_id","Рассылка по разделу, если оставить пустым рассылается всем",9, array(
            'showInList'=>0, 'editInList'=>0, 'valsFromTable'=>'email_categories', 'valsFromCategory'=>-1,
            'valsEchoField'=>'title'));
        $this->fld[] = new Field("text_for_mail","Короткий текст для письма",16);
        $this->fld[] = new Field("creation_time","Date of creation",4);
        $this->fld[] = new Field("update_time","Date of update",4);
    }
    function beforeAdd()
    {

        $emails='SELECT email FROM email WHERE cat_id='.$this->fld[8]->val;
        //$emails=pdoQuery($emails);
        $emails=pdoFetchAll($emails);
      
        foreach ($emails as $email )
        {
            $message = "<p> ".$this->fld[9]->val." </p>";
            $message .= '<a href="http://'.$_SERVER['SERVER_NAME'].'/news/'.$this->fld[0]->val.'">Узнать детальную информацию можно по ссылке: '."\r\n</a>";
            $subject = 'Новая информация на сайте, про'.$this->fld[3]->val[1];
            $headers  = "Content-type: text/html; charset=UTF-8 \r\n";
            $headers .= "From: sartorius@sartorius.com.ua \r\n";
            //mail($email['email']);
            mail($email['email'], $subject, $message, $headers);
           // var_dump(1);
        }
        //die();
    }
    function afterAdd($row) {            
        if (empty($row['alias'])) {
            $qup = "UPDATE " . $this->TABLE . " SET alias = '" . Translit($row['title_1'])."-". $row['id'] ."' WHERE id = " 
            . $row['id'];
            pdoExec($qup);
        }
        
        if (empty($row['custom_date'])) {

            $qup = "UPDATE news SET custom_date = '"
                . gmdate('d.m.Y', $row['creation_time'])
                ."' WHERE id = " . $row['id'];
            pdoExec($qup);
        }

        
       
    }
    
    function afterEdit($row){
        
        if (empty($row['alias'])) {
            $qup = "UPDATE " . $this->TABLE . " SET alias = '" . Translit($row['title_1'])."-". $row['id'] ."' WHERE id = " 
            . $row['id'];
            pdoExec($qup);
        }
        
        if (empty($row['custom_date'])) {

            $qup = "UPDATE projects SET custom_date = '"
                . gmdate('d.m.Y', $row['creation_time'])
                ."' WHERE id = " . $row['id'];
            pdoExec($qup);
        }
        

    }
}

class admin_news_categories extends AdminTable
{

    public $TABLE           = 'news_categories';
    public $IMG_SIZE        = 223; // макс высота
    public $IMG_VSIZE       = 140;
    public $IMG_RESIZE_TYPE = 5; //рeсайз по высоте
    public $IMG_BIG_SIZE    = 740;
    public $IMG_BIG_VSIZE   = 480;
    public $IMG_NUM         = 0;
    public $ECHO_NAME       = 'title';
    public $SORT            = 'sort';
    public $FIELD_UNDER     = "cat_id";

    public $NAME            = "Категории новостей";
    public $NAME2           = "категория";

    public $MULTI_LANG      = 1;

    function __construct()
    {




        $this->fld[] = new Field("title","Заголовок",1, array('multiLang'=>1));
        $this->fld[] = new Field("cat_id","Находится в разделе",9, array(
            'showInList'=>0, 'editInList'=>0, 'valsFromTable'=>'news_categories', 'valsFromCategory'=>-1,
            'valsEchoField'=>'title'));
              $this->fld[] = new Field("sort","SORT",4);
        $this->fld[] = new Field("creation_time","Date of creation",4);
        $this->fld[] = new Field("update_time","Date of update",4);
    }

    function afterAdd($row) {



    }

    function afterEdit($row){




    }
}


class admin_articles extends AdminTable
{

    public $TABLE           = 'articles';
    public $IMG_SIZE        = 223; // макс высота
    public $IMG_VSIZE       = 140;
    public $IMG_RESIZE_TYPE = 1; //рeсайз по высоте
    public $IMG_BIG_SIZE    = 740;
    public $IMG_BIG_VSIZE   = 480;
    public $IMG_NUM         = 1;
    public $ECHO_NAME       = 'title';
    public $SORT            = 'custom_date DESC, sort';
    public $FIELD_UNDER     = "cat_id";
    public $NAME            = "Вебинары";
    public $NAME2           = "вебинар";

    public $MULTI_LANG      = 1;

    function __construct()
    {
        $this->fld[] = new Field("alias","Alias (геренерируеться, если не заполнен)",1);
        $this->fld[] = new Field("status","Опубликовать",6,array('showInList'=>1, 'editInList'=>1));
        $this->fld[] = new Field("custom_date","Дата публикации",13,array('showInList'=>1));
        $this->fld[] = new Field("title","Заголовок",1, array('multiLang'=>1));
        $this->fld[] = new Field("description","Короткое описание",2, array('multiLang'=>1));
        $this->fld[] = new Field("text","Текст",2, array('multiLang'=>1));
        $this->fld[] = new Field("sort","SORT",4);
        $this->fld[] = new Field("creation_time","Date of creation",4);
        $this->fld[] = new Field("update_time","Date of update",4);
    }

    function afterAdd($row) {
        if (empty($row['alias'])) {
            $qup = "UPDATE " . $this->TABLE . " SET alias = '" . Translit($row['title_1'])."-". $row['id'] ."' WHERE id = "
                . $row['id'];
            pdoExec($qup);
        }

        if (empty($row['custom_date'])) {

            $qup = "UPDATE news SET custom_date = '"
                . gmdate('d.m.Y', $row['creation_time'])
                ."' WHERE id = " . $row['id'];
            pdoExec($qup);
        }


    }

    function afterEdit($row){

        if (empty($row['alias'])) {
            $qup = "UPDATE " . $this->TABLE . " SET alias = '" . Translit($row['title_1'])."-". $row['id'] ."' WHERE id = "
                . $row['id'];
            pdoExec($qup);
        }

        if (empty($row['custom_date'])) {

            $qup = "UPDATE projects SET custom_date = '"
                . gmdate('d.m.Y', $row['creation_time'])
                ."' WHERE id = " . $row['id'];
            pdoExec($qup);
        }


    }
}


class admin_catalogs extends AdminTable
{

    public $TABLE           = 'catalogs';
    public $IMG_SIZE        = 223; // макс высота
    public $IMG_VSIZE       = 140;
    public $IMG_RESIZE_TYPE = 1; //рeсайз по высоте
    public $IMG_BIG_SIZE    = 740;
    public $IMG_BIG_VSIZE   = 480;
    public $IMG_NUM         = 1;
    public $ECHO_NAME       = 'title';
    public $SORT            = 'custom_date DESC, sort';
    public $FIELD_UNDER     = "cat_id";
    public $NAME            = "Каталоги";
    public $NAME2           = "каталог";

    public $MULTI_LANG      = 1;

    function __construct()
    {
        $this->fld[] = new Field("alias","Alias (геренерируеться, если не заполнен)",1);
        $this->fld[] = new Field("status","Опубликовать",6,array('showInList'=>1, 'editInList'=>1));
        $this->fld[] = new Field("title","Заголовок",1, array('multiLang'=>1));
        $this->fld[] = new Field("text","Текст",2, array('multiLang'=>1));
        $this->fld[] = new Field("sort","SORT",4);
        $this->fld[] = new Field("creation_time","Date of creation",4);
        $this->fld[] = new Field("update_time","Date of update",4);
    }

    function afterAdd($row) {
        if (empty($row['alias'])) {
            $qup = "UPDATE " . $this->TABLE . " SET alias = '" . Translit($row['title_1'])."-". $row['id'] ."' WHERE id = "
                . $row['id'];
            pdoExec($qup);
        }

        if (empty($row['custom_date'])) {

            $qup = "UPDATE news SET custom_date = '"
                . gmdate('d.m.Y', $row['creation_time'])
                ."' WHERE id = " . $row['id'];
            pdoExec($qup);
        }


    }

    function afterEdit($row){

        if (empty($row['alias'])) {
            $qup = "UPDATE " . $this->TABLE . " SET alias = '" . Translit($row['title_1'])."-". $row['id'] ."' WHERE id = "
                . $row['id'];
            pdoExec($qup);
        }

        if (empty($row['custom_date'])) {

            $qup = "UPDATE projects SET custom_date = '"
                . gmdate('d.m.Y', $row['creation_time'])
                ."' WHERE id = " . $row['id'];
            pdoExec($qup);
        }


    }
}
