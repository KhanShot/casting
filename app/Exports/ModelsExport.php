<?php

namespace App\Exports;

use App\Casting_model;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromQuery;

class ModelsExport implements FromCollection, WithHeadings
{
    public function collection(){
        return Casting_model::all();
    }
    
    
    public function headings():array
    {
    	return[	
			'id',
    		'Имя',
    		'Фамилия',
    		'Рейтинг',
			'Очество',
			'Почта',
			'Соц аккаунты',
			'Телефон',
			'Есть загран',
			'выйти за гран',
			'возраст',
			'рост',
			'вес',
			'телосложение',
			'размер одежды',
			'размер обуви',
			'внешний вид',
			'цвет волос',
			'цвет глаз',
			'профессия',
			'место работы',
			'спорт',
			'боевые навыки',
			'Танцы',
			'инструменты',
			'вокал',
			'права',
			'Езда верхом',
			'остальные навыки',
			'языки',
			'опыт в тв',
			'отып в театр',
			'о себе',
			'сможет обнаженно ',
			'работает сейчас',
			'будет ли работать',
			'дата заполнение',
			'фото(урл)',
			'видео(урл)',
			'created_at',
    	];
    }
   
}
