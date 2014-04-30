// JavaScript Document


//Use this url below to get your access token
//https://instagram.com/oauth/authorize/?display=touch&client_id=be8c7e1bc44c4cc48e18b8570f0e423d&redirect_uri=http://courtneylindstrand.com/static/instagram&response_type=token 

//if you need a user id for yourself or someone else use:
//http://jelled.com/instagram/lookup-user-id
	
						
$(function() {
	
	var apiurl = "https://api.instagram.com/v1/tags/nyfw/media/recent?access_token=15825378.be8c7e1.54f04adbf6e241c09e5dd939350488a7&callback=?"
	var access_token = location.hash.split('=')[1];
	var html = ""
	
		$.ajax({
			type: "GET",
			dataType: "json",
			cache: false,
			url: apiurl,
			success: parseData
		});
				
		
		function parseData(json){
			console.log(json);
			
			$.each(json.data,function(i,data){
				html += '<a href="' + data.link + '" target="_blank"><img class="instaimages" src ="' + data.images.low_resolution.url + '"></a>'
			});
			
			console.log(html);
			$("#results").append(html);
			
		}
		
		
                
               
 });
		
		
		
		
	

		
