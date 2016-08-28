<html>

<head>

	<title>Parser</title>

	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<!--
	<link rel="stylesheet" type="text/css" href="ext-4.0.2/resources/css/ext-all.css" />
	<script type="text/javascript" src="ext-4.0.2/ext-all.js"></script>
	-->
	<link rel="stylesheet" type="text/css" href="ext-6.0.2/build/classic/theme-neptune/resources/theme-neptune-all.css">
	<script type="text/javascript" src="ext-6.0.2/build/ext-all-debug.js"></script>
	<script type="text/javascript" src="ext-6.0.2/build/classic/theme-neptune/theme-neptune.js"></script>

<script>

var store = Ext.create('Ext.data.JsonStore', {     // определение хранилища для удаленного источника данных
    fields: [{name: 'ip', type: 'float'}, 'ip', 'br', 'os', 'urli', {name: 'urli_c', type: 'float'}, 'urlo'],   // поля записей. каждая запись содержит - название городва и телефон
    pageSize:2,                 // количество считываемх зАраз записей
    proxy: {                    // описание proxy-объекта, кторый будет запрашивать сервер
        type: 'ajax',           // тип прокси = Ajax
        url: 'get.php',         // адрес удаленного источника данных
        reader: {
            type: 'json',       // тип данных - json, хотя есть и другие варианты
            root: 'log'      // здесь свойство JSON объекта в котором передается сам массив данных
        }
    }
});
store.load(); //  и немедленно загружаем данные

var grid = Ext.create('Ext.grid.Panel', {
    store: store,               // определили хранилище
    title: 'Array Grid',        // Заголовок
    columns:[
				{text: 'id',       dataIndex: 'id'     },
				{text: 'ip',       dataIndex: 'ip'     },
				{text: 'br',       dataIndex: 'br'     },
				{text: 'os',       dataIndex: 'os'     },
				{text: 'urli',     dataIndex: 'urli'   },
				{text: 'urli_c',   dataIndex: 'urli_c' },
				{text: 'urlo',     dataIndex: 'urlo'   }
            ],
		dockedItems: [{   // bbar - нижний тулбар с листалкой
                dock: 'bottom',
                xtype:'pagingtoolbar',
                store:store,               // указано хранилище
                displayInfo: true,          // вывести инфо обо общем числе записей
                displayMsg: 'Показано  {0} - {1} из {2}' // формат инфо
        }]
});

var win1 = Ext.create('widget.window', {
        title: 'Пример',
        closeAction: 'hide',
        width: 1200,
        height: 550,
        items: [grid]
    });
</script>
<button onclick="win1.show()">Клик-клак</button>

</head>

<body></body>

</html>
