<?php
/*
 * Текстовые блоки
 * */

class admin_text_blocks extends AdminTable
{
    public $TABLE = 'text_blocks';
    public $ECHO_NAME = 'name';

    public $NAME="Текстовые блоки";
    public $NAME2="текстовый блок";
    public $MULTI_LANG = 1;
    public $SORT = "sort";
    public $FIELD_UNDER = 'parent_id';
    
    function __construct()
    {
        $this->fld[] = new Field("name","Название",1);
        $this->fld[] = new Field("alias","Алиас",1, array('showInList'=>1));
        $this->fld[] = new Field("title","Заголовок",1,array('multiLang'=>1));
        $this->fld[] = new Field("text","Текст",2,array('multiLang'=>1));
        $this->fld[] = new Field("parent_id","В разделе", 9, array(
                                'showInList'=>0, 'editInList'=>0, 'valsFromTable'=>'text_categories', 'valsFromCategory'=>-1, 
                                'valsEchoField'=>'name'));
        $this->fld[] = new Field("creation_time","Date of creation",4);
        $this->fld[] = new Field("update_time","Date of update",4);
        $this->fld[] = new Field("sort","SORT",4);
    }

};
/*
 * Словарь
 * */

class admin_slovar extends AdminTable
{
    public $TABLE = 'slovar';
    public $ECHO_NAME = 'title';
    public $NAME="Настройки сайта";
    public $NAME2="настройку";
    public $MULTI_LANG = 1;
    public $SORT = "sort";
    public $FIELD_UNDER = 'parent_id';

    function __construct()
    {
        $this->fld[] = new Field("title","Название",1);
        $this->fld[] = new Field("alias","Алиас",1, array('showInList'=>1));
        $this->fld[] = new Field("value","Значение",1, array('showInList'=>1, 'multiLang'=>1));
//        $this->fld[] = new Field("parent_id","В разделе", 9, array(
//                                'showInList'=>0, 'editInList'=>0, 'valsFromTable'=>'text_categories', 'valsFromCategory'=>-1, 
//                                'valsEchoField'=>'name'));
        $this->fld[] = new Field("creation_time","Date of creation",4);
        $this->fld[] = new Field("update_time","Date of update",4);
        $this->fld[] = new Field("sort","SORT",4);
    }
    
    public function afterAdd($row){
        YandexTranslate($row, $this->TABLE);
    }
    
    public function afterEdit($row){
        YandexTranslate($row, $this->TABLE);
    }
};


class admin_text_categories extends AdminTable
{
    public $TABLE = 'text_categories';

    public $ECHO_NAME = 'name';

    public $NAME="Текстовая категория";
    public $NAME2="текстовую категорию";
    public $FIELD_UNDER = 'parent_id';
    public $SORT = "sort";
    function __construct()
    {
        $this->fld[] = new Field("name","Название",1);
        $this->fld[] = new Field("parent_id","В разделе", 9, array(
                'showInList'=>0, 'editInList'=>0, 'valsFromTable'=>'text_categories', 'valsFromCategory'=>-1, 
                'valsEchoField'=>'name'));

        $this->fld[] = new Field("creation_time","Date of creation",4);
        $this->fld[] = new Field("update_time","Date of update",4);
        $this->fld[] = new Field("sort","SORT",4);
    }
};
