document.addEventListener('DOMContentLoaded', function () {
    const progressBar = document.querySelector('.progress-bar');
    const audio = document.getElementById('myAudio');
    const video = document.getElementById('myVideo');
    const duration = 51; // Durée de la progression en secondes

    let currentTime = 0;

    // Fonction pour mettre à jour la barre de progression
    function updateProgressBar() {
        currentTime++;
        const progress = (currentTime / duration) * 100;
        progressBar.style.width = progress + '%';

        // Vérifier si l'audio est terminé
        if (audio.ended || currentTime >= duration) {
            clearInterval(progressInterval);
            video.style.display = 'block';
            audio.pause(); // Arrêter l'audio
        }
    }

    // Lancer la mise à jour de la barre de progression toutes les secondes
    const progressInterval = setInterval(updateProgressBar, 1000);

    // Lancer l'audio
    audio.play();
});

// Sélection du conteneur
var container = document.getElementById('container');

// Fonction pour faire disparaître le conteneur après un certain délai (en millisecondes)
function disparitionApresDelai() {
    setTimeout(function() {
        container.style.display = 'none'; // Masquer le conteneur
    }, 51000); // 51000 millisecondes (51 secondes)
}

// Appel de la fonction pour faire disparaître le conteneur après un certain délai
disparitionApresDelai();














// document.addEventListener("DOMContentLoaded", function() {
//     const progressBar = document.getElementById('progressBar');
//     const audio = document.getElementById('myAudio');
//     const video = document.getElementById('myVideo');

//     const duration = 60; // Durée de la progression en secondes
//     const interval = 2; // Intervalle de temps pour jouer le son en secondes

//     let currentTime = 0;
//     const intervalId = setInterval(function() {
//         currentTime += interval;
//         const progress = (currentTime / duration) * 100;
//         progressBar.style.width = progress + '%';
//         if (currentTime >= duration) {
//             clearInterval(intervalId);
//             video.style.display = 'block';
//             audio.pause();
//         }
//     }, interval * 1000);

//     audio.play();
// });












// document.addEventListener('DOMContentLoaded', function () {
//     const progressBar = document.querySelector('.progress-bar');
//     const audio = document.getElementById('myAudio');
//     const video = document.getElementById('myVideo');
//     const duration = 51; // Durée de la progression en secondes
//     const loopDuration = 18; // Durée du son à boucler en secondes

//     let currentTime = 0;

//     // Fonction pour mettre à jour la barre de progression
//     function updateProgressBar() {
//         currentTime++;
//         const progress = (currentTime / duration) * 100;
//         progressBar.style.width = progress + '%';

//         // Jouer le son en boucle
//         audio.currentTime = (currentTime % loopDuration);
//         audio.play();

//         // Vérifier si la progression est terminée
//         if (currentTime >= duration) {
//             clearInterval(progressInterval);
//             video.style.display = 'block';
//         }
//     }

//     // Lancer la mise à jour de la barre de progression toutes les secondes
//     const progressInterval = setInterval(updateProgressBar, 1000);
// });

// // Sélection du conteneur
// var container = document.getElementById('container');

// // Fonction pour faire disparaître le conteneur après un certain délai (en millisecondes)
// function disparitionApresDelai() {
//     setTimeout(function() {
//         container.style.display = 'none'; // Masquer le conteneur
//     }, 61000); // 61000 millisecondes (61 secondes)
// }

// // Appel de la fonction pour faire disparaître le conteneur après un certain délai
// disparitionApresDelai();
// // 














// document.addEventListener('DOMContentLoaded', function () {
//     const progressBar = document.querySelector('.progress-bar');
//     const audio = document.getElementById('myAudio');
//     const video = document.getElementById('myVideo');
//     const duration = 60; // Durée de la progression en secondes
//     const loopDuration = 18; // Durée du son à boucler en secondes

//     let currentTime = 0;
//     let audioPlayCount = 0;

//     // Fonction pour mettre à jour la barre de progression
//     function updateProgressBar() {
//         currentTime++;
//         const progress = (currentTime / duration) * 100;
//         progressBar.style.width = progress + '%';

//         // Ajouter la classe pour l'effet de flash
//         progressBar.classList.add('flash');

//         // Jouer le son en boucle
//         if (currentTime % loopDuration === 0) {
//             audio.currentTime = 0;
//             audio.play();
//             audioPlayCount++;
//         }

//         // Vérifier si la progression est terminée
//         if (currentTime >= duration || audioPlayCount * loopDuration >= duration) {
//             clearInterval(progressInterval);
//             if (audioPlayCount * loopDuration >= duration) {
//                 audio.pause();
//                 audio.currentTime = 0;
//             }
//             // Charger la vidéo
//             video.style.display = 'block';
//             video.play();
//             // Demander le plein écran pour la page entière
//             if (document.documentElement.requestFullscreen) {
//                 document.documentElement.requestFullscreen();
//             } else if (document.documentElement.mozRequestFullScreen) { /* Firefox */
//                 document.documentElement.mozRequestFullScreen();
//             } else if (document.documentElement.webkitRequestFullscreen) { /* Chrome, Safari & Opera */
//                 document.documentElement.webkitRequestFullscreen();
//             } else if (document.documentElement.msRequestFullscreen) { /* IE/Edge */
//                 document.documentElement.msRequestFullscreen();
//             }
//         }
//     }

//     // Lancer la mise à jour de la barre de progression toutes les secondes
//     const progressInterval = setInterval(updateProgressBar, 1000);
// });
