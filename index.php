<html>

<head>

	<title>Parser</title>

	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

	<link rel="stylesheet" type="text/css" href="ext-6.0.2/build/classic/theme-neptune/resources/theme-neptune-all.css">
	<script type="text/javascript" src="ext-6.0.2/build/ext-all-debug.js"></script>
	<script type="text/javascript" src="ext-6.0.2/build/classic/theme-neptune/theme-neptune.js"></script>

<script>

var store = Ext.create('Ext.data.JsonStore', {    
    fields: [{name: 'ip', type: 'float'}, 'ip', 'br', 'os', 'urli', {name: 'urli_c', type: 'float'}, 'urlo'],  
    //pageSize: 3,                 // количество считываемх за раз записей
    proxy: {                    // описание proxy-объекта, кторый будет запрашивать сервер
        type: 'ajax',           // тип прокси = Ajax
        url: 'get.php?get=0',         // адрес удаленного источника данных
        reader: {
            type: 'json',       // тип данных - json, хотя есть и другие варианты
            root: 'log'      // здесь свойство JSON объекта в котором передается сам массив данных
        }
    }
});
store.load(); //  и немедленно загружаем данные

var grid = Ext.create('Ext.grid.Panel', {
    store: store,               
    //title: 'Grid',        
    //height: 300,
	plugins: 'gridfilters',
	columns:[
				{text: '№', dataIndex: 'id', flex: 1 },
				{
					text: 'IP',
					dataIndex: 'ip',
					flex: 2,
					filter: { type: 'string' }				
				},
				{text: 'Браузер', dataIndex: 'br', flex: 2 },
				{text: 'Операционная система', dataIndex: 'os', flex: 2 },
				{text: 'Последняя открытая страница', dataIndex: 'urli', flex: 6 },
				{text: 'Уникальных страниц просмотрено', dataIndex: 'urli_c', flex: 1 },
				{text: 'Первый раз пришёл из', dataIndex: 'urlo', flex: 6 }
            ],
});


var inf = Ext.create('widget.window', {
        title: 'Пояснения тестового задания',
		maximizable: true,
		y:50, 
        closeAction: 'hide',
        width: 500,
        autoheight: true,
		html: '<br>Описание можно посмотреть в <a href="https://github.com/skushnarev/parser">README.md</a> файле или же в <a href="https://github.com/skushnarev/parser">GitHub</a>.<br><br>'
    }); 

function i(){
	var inst = Ext.create('widget.window', {
			title: 'Создание таклиц',
			maximizable: true,
			y:50, 
			closeAction: 'hide',
			width: 900,
			autoheight: true,
			loader: {
				  url: 'install.php',
				  autoLoad: true
			  }
		}); 
	inst.show();
};
		
function p(){
	var pars = Ext.create('widget.window', {
			title: 'Прочтение логов',
			maximizable: true,
			y:50, 
			closeAction: 'hide',
			width: 500,
			autoheight: true,
			loader: {
				  url: 'parser.php',
				  autoLoad: true
			  }
		});
	
	pars.show();
}; 

function q(){
	var gt = Ext.create('widget.window', {
			title: 'Выборка',
			maximizable: true,
			y:50, 
			closeAction: 'hide',
			width: 900,
			autoheight: true,
			loader: {
				  url: 'get.php?get=2',
				  autoLoad: true
			  }
		});
	
	gt.show();
}; 


var conf = Ext.create('widget.window', {
        title: 'Конфиги',
		maximizable: true,
		y:50, 
        closeAction: 'hide',
        width: 500,
        autoheight: true,
        loader: {
              url: 'get.php?get=1',
              autoLoad: true
          }
    }); 
	


var win = Ext.create('widget.window', {
        title: 'Выборка уникальных IP',
		maximizable: true,
		y:0, 
        closeAction: 'hide',
		//height: '100%',
        width: '100%',
        autoheight: true,
		tbar: [                     					  
			{
				text:'Информация',
				handler: function(){ inf.show() }
			},
			'-',
			{
				text:'Создать таклицы',
				handler: function(){ i() }
			},
			'-',
			{
				text:'Прочитать логи',
				handler: function(){ p() }
			},
			'-',
			{
				text:'SQL запрос выборки',
				handler: function(){ q() }
			},
			'->',
			{
				text:'Конфиги',
				handler: function(){ conf.show() }
			}
		],
        items: [grid]
    }); 
	
Ext.onReady(function(){win.show()}); 


</script>

</head>

<body></body>

</html>
