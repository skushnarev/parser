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

	var win1 = Ext.create('widget.window', {     // создание окна
	  title: 'Пример 1',
	  loader:{                         // определение загрузчика
              url: 'get.php',
              autoLoad: true
          },
	  autoHeight: true,
	  width: '30%', // ширина. Строковое значение
								  // задается по стандарту - px,%, em и т.д.
								  // целое значение соответствует px
	  closeAction: 'hide',       // Указание на то, что окно при закрывании
								  // не удаляется вместе с содержимым,
	  tbar: [                     // тулбар (toolbar) в верхней части окна
			{text:'Первый'},      // массив кнопок. нетрудно догадаться,
			'-',					  // что text = текст кнопки
			{text:'Второй'},
			'-',
			{text:'Третий'},
			'->',
			{
            text:'Close',
            handler: function(){
              win1.close()
            }
         }
		   ],
	bbar: [{ iconCls:'icon_example'}] // тулбар (bbar) в нижней  части окна

	});

</script>
<button onclick="win1.show()">Клик-клак</button>

</head>

<body></body>

</html>
