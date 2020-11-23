
		const element = document.getElementById('search_bar');
		
		element.addEventListener('click',function(){
			element.innerHTML = "c'est clické !";
			console.log("cosnsole cliqué");
			//element.style.backgroundColor = "#000";
			element.classList.remove("search_bar");
			element.classList.add("search_bar_javascript");

		});

		parrent = document.getElementById('menu');
		child = document.getElementById('rayon');
		parrent.addEventListener('mouseover',function()
		{

		
			/* div_child = document.createElement('div');// nom de la balise en param

						console.log("mouseover");
	
				child.style.backgroundColor = "#000";
				parrent.appendChild(child);	*/
//child.innerHTML = '<label class="rayon_title">Notre rayon Boisson</label>';
	//div_child.textContent = 'Hello world.';
	//div_child.innerHTML='<span>Hello word</span>';

		},false);
	function hover (description)
	{
		console.log('apple are delicious ');
				document.getElementById('menu').innerHTML= description;
	}
function ajouterAuPanier()
{
console.log('ajouté au panier');
}
/*
function openWindow()
{
	//console.error('window is openning');
parrent = document.getElementById('user_div');
div = document.getElementById('user_section');
div.style.display="block";
div.style.width="30%";
div.style.height="550px";
div.style.float="right";
div.style.position="absolute";
parrent.style.position="absolute";
document.body.style.position="relative";
div.style.backgroundColor="white";
//parrent.appendChild(div);
/*div = document.createElement("div");
div.style.backgroundColor = "red";

div.classList.add("modal_class");
div.style.width= '25%';

div.style.float='right';

div.style.height='550px';
div.textContent = "!";
div.style.display="block";

div.style.hidden='false';
parrent.appendChild(div);*/

//console.log(div.outerHTML);
//div.style.left='0';
//div.style.right = 'auto';
//document.body.appendChild(div);
//console.log(parrent.outerHTML);


//}*/

parrent = document.getElementById('user_div');
parrent.addEventListener('click',function(event)
{
/*child = document.createElement('div');
	child.style.backgroundColor = "#000cf";
parrent.appendChild('child');
*/


div = document.getElementById('user_section');
menu = document.getElementById('menu');
entete= document.getElementsByClassName('en_tete');
entete.style.position='relative';//document.head...
menu.style.position= 'absolute';
div.style.display="block";
div.style.index="1";
div.style.width="30%";
div.style.height="550px";
div.style.float="right";
div.style.position="absolute";
parrent.style.position="relative";
document.body.style.position="relative";
div.style.backgroundColor="white";
},false);
