
			(function($K)
			{
				

				
			    $K.add('module', 'mymodule', {
			        init: function(app, context)
			        {
			            this.app = app;
			
			            // define service
			            this.message = app.message;
			        },
			        // events
			        onclick: function(e, element, type)
			        {
			            e.preventDefault();
			            if (type === 'show')
			            {
			                this.message.show({ message: 'My message' });
			            }
			            else if (type === 'show-error')
			            {
			                this.message.show({
			                    message: 'My error message',
			                    type: 'is-error',
			                    position: 'left'
			                });
			            }
			            else if (type === 'cpu-count')
			            {
			            	this.message.show({
			            		message: '针对双路，默认都是两颗，如果需要使用双路主板使用单颗cpu请填入1。',
			                    type: 'is-success',
			                    position: 'centered'
			            	});
			            }
			            else if (type === 'memsock-count')
			            {
			            	this.message.show({
			            		message: '内存插槽数量，默认根据配置自动选择。',
			                    type: 'is-success',
			                    position: 'centered'
			            	});
			            }
			        }
			    });

			    $K.add('module', 'showbxform', {
			        init: function(app, context)
			        {
			            this.app = app;
						this.modal = app.modal;
			        },
					onclick: function(e, element, type)
					{
						
						if (type === 'test01')
			            {
			                this.showModel();
			            }
					},
					showModel: function()
					{
						this.modal.open({
			                target: '#bxform',
			                title: 'My Modal'
			            });
					}

			    });
			    
			    $K.add('module','autosolu',{
			    	init: function(app,context)
			    	{
			    		this.app = app;
			    		this.modal = app.modal;
			    		this.message = app.message;
			    	},
			    	onclick: function(e,element,type)
			    	{	
			    		if(type==='show')
			    		{
			    			this.showModal();	
			    		}
			    		else if(type==='addDevice')
			    		{
			    			this.showaddDevice();
			    		}
			    		else if(type==='info')
			    		{
			    			this.showDeviceinfo();
			    		}
			    		else if(type==='showcust')
			    		{
			    			this.message.show({
			            		message: '请按照规范输入信息：“xx学校xx学院 xxx” 没有学院可以不写学院。',
			                    type: 'is-success',
			                    position: 'centered'
			            	});
			    		}
			    	},
			    	onchange: function(e,element,type)
			    	{
			    		if(type==='showretype')
			    		{
			    			this.message.show({
			            		message: '客户的研究方向，没有或者不需要可不选择。',
			                    type: 'is-success',
			                    position: 'centered'
			            	});
			    		}	
			    	},
			    	showModal: function()
			    	{
			    		this.modal.open({
			    			target:'#auto-solu',
			    			title:'生成方案'
			    		});
			    	},
			    	showaddDevice: function()
			    	{
			    		this.modal.open({
			    			target:'#addevice',
			    			title:'添加设备',
			    			width:'40%'
			    		});
			    	},
			    	showDeviceinfo: function()
			    	{
			    		this.modal.open({
			    			target:'#deviceinfo',
			    			title:'设备信息',
			    			width:'40%'
			    		});
			    	}
			    });

			})(Kube);
			
			
		
				var fpriArr = new Array();
				$("input#exprice").each(function(){
					fpriArr.push($(this).val());	
					//alert($("td.expcount").html());
				});
				var fprictArr = new Array();
				$("td.expcount").each(function(){
					fprictArr.push($(this).html());
				});
				for(var i=0;i<fprictArr.length;i++){
					fpriArr[i] = fpriArr[i]*fprictArr[i];
				}
				
				$("input#ctprice").val(eval(fpriArr.join('+')));
			
			$("input#exprice").change(function(){
				var priArr = new Array();
				$("input#exprice").each(function(){
					priArr.push($(this).val());	
					//alert($("td.expcount").html());
				});
				var prictArr = new Array();
				$("td.expcount").each(function(){
					prictArr.push($(this).html());
				});
				for(var i=0;i<prictArr.length;i++){
					priArr[i] = priArr[i]*prictArr[i];
				}
				
				$("input#ctprice").val(eval(priArr.join('+')));
			});
			
			
			$K.init();
			
				var price = document.getElementById('finprice').innerHTML;
				var disc = document.getElementById('disc')
				var discprice = document.getElementById('discprice')
				disc.onchange = function(){
					discprice.value=price*disc.value/10;
				}
			