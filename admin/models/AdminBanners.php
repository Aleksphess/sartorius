<?php
/*
 *  Баннеры
 * 
 */

class admin_banners extends AdminTable
{
    public $SORT            = 'sort DESC';
    public $TABLE           = 'banners';
    public $IMG_BIG_SIZE    = 500;
    public $IMG_BIG_VSIZE   = 300;
    public $IMG_NUM         = 1;
    public $ECHO_NAME       = 'name';
    public $IMG_SIZE        = 458; //- размер маленькой картинки
    public $IMG_VSIZE       = 206; //- размер маленькой картинки
    public $IMG_RESIZE_TYPE = 5; 
    public $NAME            = "Баннеры";
    public $NAME2           = "баннер";

    public $MULTI_LANG      = 0;
    public $USE_TAGS        = 0;
    
    function __construct()
    {
        $this->fld=array(
            new Field("name","Название",1),
            new Field("href_url","Ссылка",1),
//            new Field("title_top","Заголовок",1, array('multiLang'=>1)),
            new Field("template", "Шаблон&nbsp;&nbsp;&nbsp;", 10,
                array('showInList' => 1,
                    'values' => array(
                        '458x206',
                        '500x300',
                    )
                )
            ),
            //new Field("title_mid","Заголовок (середина)",1, array('multiLang'=>1)),
            //new Field("button_color","Цвет кнопки (Формат: #ХХХХХХ)",1),
            new Field("sort","SORT",4),
            new Field("status","Отображать",6, array('showInList'=>1, 'editInList'=>1)),
            new Field("creation_time","Date of creation",4),
            new Field("update_time","Date of update",4),
        );       
    }
    
    public function beforeAdd()
    {
        foreach($this->fld as $fld){
            if($fld->name == 'template') {
                switch ($fld->val) {
                    case '458x206':
                        $this->IMG_SIZE = 458;
                        $this->IMG_VSIZE = 206;
                        break;
                    case '500x300':
                        $this->IMG_SIZE = 500;
                        $this->IMG_VSIZE = 300;
                        break;
                    default : break;
                }
                return false;
            }
        }
    }
}