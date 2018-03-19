<?php

/**
 * Created by PhpStorm.
 * User: kossworth
 * Date: 29.01.17
 * Time: 22:28
 *
 *  Обратный звонок
 * 
 */

class admin_callbacks extends AdminTable
{

    public $TABLE       = 'callbacks';
    public $IMG_NUM     = 0;
    public $ECHO_NAME   = 'user_name';
    public $SORT        = 'creation_time DESC';
    public $NAME        = "заявки";
    public $NAME2       = "заявку";

    function __construct()
    {
        $this->fld[] = new Field("user_name","Имя пользователя",1);
        $this->fld[] = new Field("status","Обработано",6,array('showInList'=>1, 'editInList'=>1));
        $this->fld[] = new Field("user_phone","Телефон пользователя",1, array('showInList'=>1, 'editInList'=>0));
        $this->fld[] = new Field("creation_time","Дата создания",4, array('showInList'=>1, 'editInList'=>0));
        $this->fld[] = new Field("update_time","Date of update",4);
    }
    
    function show_creation_time($row) 
    {
        return date("d.m.Y H:i" , $row['creation_time']);
    }

}

class admin_callback_requests extends AdminTable
{
    public $TABLE       = 'callback_requests';
    public $IMG_NUM     = 0;
    public $ECHO_NAME   = 'user_name';
    public $SORT        = 'creation_time DESC';
    public $NAME        = "заявки";
    public $NAME2       = "заявку";

    function __construct()
    {
        $this->fld[] = new Field("user_name","Имя пользователя",1);
        $this->fld[] = new Field("status","Обработано",6,array('showInList'=>1, 'editInList'=>1));
        $this->fld[] = new Field("user_phone","Телефон пользователя",1);
        $this->fld[] = new Field("user_email","Email пользователя",1);
        $this->fld[] = new Field("comment","Комментарий",2);
        $this->fld[] = new Field("creation_time","Дата создания",4, array('showInList'=>1, 'editInList'=>0));
        $this->fld[] = new Field("update_time","Date of update",4);
    }
    
    function pre_Table() {
        return '<div align="right"><strong><span aria-hidden="true" class="glyphicon glyphicon-floppy-save"> </span><a style="" href="export/get_requests_xls.php?table='.$this->TABLE.'" target="_blank">экспорт всех в Excel</a></strong></div>';
    }

    function show_creation_time($row) 
    {
        return date("d.m.Y H:i" , $row['creation_time']);
    }

}

class admin_one_click_buy extends AdminTable
{

    public $TABLE       = 'one_click_buy';
    public $IMG_NUM     = 0;
    public $ECHO_NAME   = 'user_name';
    public $SORT        = 'creation_time DESC';
    public $NAME        = "заявки";
    public $NAME2       = "заявку";

    function __construct()
    {
        $this->fld[] = new Field("user_name","Имя пользователя",1);
        $this->fld[] = new Field("status","Обработано",6,array('showInList'=>1, 'editInList'=>1));
        $this->fld[] = new Field("user_phone","Телефон пользователя",1);
        $this->fld[] = new Field("product_url","Ссылка на товар",1,array('showInList'=>1, 'editInList'=>0));
        $this->fld[] = new Field("creation_time","Дата создания",4, array('showInList'=>1, 'editInList'=>0));
        $this->fld[] = new Field("update_time","Date of update",4);
    }

    function show_creation_time($row) 
    {
        return date("d.m.Y H:i" , $row['creation_time']);
    }
}

class admin_consultation_requests extends AdminTable
{
    public $TABLE       = 'consultation_requests';
    public $IMG_NUM     = 0;
    public $ECHO_NAME   = 'user_name';
    public $SORT        = 'creation_time DESC';
    public $NAME        = "заявки";
    public $NAME2       = "заявку";

    function __construct()
    {
        $this->fld[] = new Field("user_name","Имя пользователя",1);
        $this->fld[] = new Field("status","Обработано",6,array('showInList'=>1, 'editInList'=>1));
        $this->fld[] = new Field("user_phone","Телефон пользователя",1);
        $this->fld[] = new Field("user_email","Email пользователя",1);
        $this->fld[] = new Field("comment","Комментарий",2);
        $this->fld[] = new Field("creation_time","Дата создания",4, array('showInList'=>1, 'editInList'=>0));
        $this->fld[] = new Field("update_time","Date of update",4);
    }
    
    function pre_Table() {
        return '<div align="right"><strong><span aria-hidden="true" class="glyphicon glyphicon-floppy-save"></span> <a style="" href="export/get_requests_xls.php?table='.$this->TABLE.'" target="_blank">экспорт всех в Excel</a></strong></div>';
    }
    
    function show_creation_time($row) 
    {
        return date("d.m.Y H:i" , $row['creation_time']);
    }
}

class admin_feedbacks extends AdminTable
{
    public $TABLE       = 'feedbacks';
    public $IMG_NUM     = 0;
    public $ECHO_NAME   = 'user_name';
    public $SORT        = 'creation_time DESC';
    public $NAME        = "отзывы";
    public $NAME2       = "отзыв";

    function __construct()
    {
        $this->fld[] = new Field("user_name","Имя пользователя",1);
        $this->fld[] = new Field("status","Проверено",6,array('showInList'=>1, 'editInList'=>1));
        $this->fld[] = new Field("user_phone","Телефон пользователя",1);
        $this->fld[] = new Field("user_mail","Email пользователя",1);
        $this->fld[] = new Field("item_id","Привязан к товару",9,
                array('showInList'=>0, 'editInList'=>0, 'valsFromTable'=>'catalog_products', 'valsFromCategory'=>null, 
                                'valsEchoField'=>'name'));
        $this->fld[] = new Field("comment","Комментарий",2);
        $this->fld[] = new Field("creation_time","Дата создания",4, array('showInList'=>1, 'editInList'=>0));
        $this->fld[] = new Field("update_time","Date of update",4);
    }
    
    function pre_Table() {
        return '<div align="right"><strong><span aria-hidden="true" class="glyphicon glyphicon-floppy-save"></span> <a style="" href="export/get_requests_xls.php?table='.$this->TABLE.'" target="_blank">экспорт всех в Excel</a></strong></div>';
    }

    function show_creation_time($row) 
    {
        return date("d.m.Y H:i" , $row['creation_time']);
    }
}

class admin_company_feedbacks extends AdminTable
{

    public $TABLE       = 'company_feedbacks';
    public $IMG_NUM     = 0;
    public $ECHO_NAME   = 'user_name';
    public $SORT        = 'creation_time DESC';
    public $NAME        = "отзывы";
    public $NAME2       = "отзыв";

    function __construct()
    {
        $this->fld[] = new Field("user_name","Имя пользователя",1);
        $this->fld[] = new Field("status","Проверено",6,array('showInList'=>1, 'editInList'=>1));
        $this->fld[] = new Field("user_phone","Телефон пользователя",1);
        $this->fld[] = new Field("user_mail","Email пользователя",1);
        $this->fld[] = new Field("rating","Рейтинг",1);
        $this->fld[] = new Field("imgs","Ссылки на изображения",1);
        $this->fld[] = new Field("comment","Комментарий",2);
        $this->fld[] = new Field("creation_time","Дата создания",4, array('showInList'=>1, 'editInList'=>0));
        $this->fld[] = new Field("update_time","Date of update",4);
    }

    function pre_Table() {
        return '<div align="right"><strong><span aria-hidden="true" class="glyphicon glyphicon-floppy-save"></span> <a style="" href="export/get_requests_xls.php?table='.$this->TABLE.'" target="_blank">экспорт всех в Excel</a></strong></div>';
    }

    function show_creation_time($row) 
    {
        return date("d.m.Y H:i" , $row['creation_time']);
    }
}