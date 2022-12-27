i=0; // Pour limiter le nombre de boutons qu'on peut sélectionner. 


function jouer(val) {
if(i<6){



document.getElementById(val).style.visibility = "hidden"; //On masque les numéros joué 
document.getElementById("selection").innerHTML+= '<input type="button" value="'+val+'"/>'; //ajouter le numéro sélectionner au conteneur sélection
document.fo.selection.value+=val+" "; // On va ajouter une instruction qui va appliquer les numéros jouer à la zone de texte sélection
i+=1; // incrémentation jusqu'a atteindre le nombre 6. Au dela, on peut pas sélectionner plus de nombres

// Si i est égal à 6, on affiche le bouton type submit

if(i==6){
    document.fo.jouer.style.visibility="visible"; // Quand les 6 nums seront pris, le bouton jouer s'affichera 
}
}
}



