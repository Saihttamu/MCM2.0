var content = document.querySelector('#hamburger-content');
var sidebarBody = document.querySelector('#hamburger-sidebar-body');
//j'ai mis le menu classique dans le menu burger
sidebarBody.innerHTML = content.innerHTML;

var button = document.querySelector('#hamburger-button');
var overlay = document.querySelector('#hamburger-overlay');
var activatedClass = 'hamburger-activated';
//on relie le button et le overlay au menu burger

button.addEventListener('click', function(e){
	e.preventDefault();//pour voir les erreur
	//console.log(this.parentNode);//pour afficher dans inspecter->consolesur le navigateur
		this.parentNode.classList.add(activatedClass);
		//maintenant quand je clique sur le menu burger, ça affiche le menu
});

overlay.addEventListener('click', function(e){
	e.preventDefault();
		this.parentNode.classList.remove(activatedClass);
//pour fermer le menu burger
})