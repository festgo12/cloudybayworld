

const mainurl = $("meta[name=base]").attr("content");
// const baseUrl = mainurl;
let gs      = '';
var wsconfig  = [];

console.log(mainurl);


 const datah = $.ajax({
	type: "GET",
	url:mainurl+"/config",
	success:function(data){
		 gs = data.gs
		wsconfig = data.wsconfig

		console.log(data);
		// console.log(wsconfig);


		// return data;
		// // Enable pusher logging - don't include this in production
		// Pusher.logToConsole = true;

		// var pusher = new Pusher(wsconfig.key, {
		// // encrypted: true,
		// cluster: wsconfig.cluster,
		// authEndpoint: wsconfig.authEndpoint,
		// // authEndpoint: '{{route("pusher.auth")}}',
		// forceTLS: false,
		// wsHost: window.location.hostname,
		// wsPort: 6001,
		// auth: {
		// 	headers: {
		// 		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		// 	}
		// }
		// });

		// console.log(pusher);
	},

	error:function(err){

	},

});

console.log(gs);

console.log(wsconfig);

console.log(datah);
console.log(datah.responseJSON);
// if(datah.status == 200 ){

// }

// const rawResponse = fetch(mainurl+"/config", {
// 	method: 'GET',
// });
// const content = rawResponse.json();

// console.log(content);
