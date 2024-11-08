window.onload = function() {
    let imageUrls = []; 
    let imageDescriptions = []; 
    let currentIndex = 0; 

    const xhr = new XMLHttpRequest();
    xhr.open('GET', 'xml/IMGViewer.xml', false); 
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            const images = xhr.responseXML.getElementsByTagName('images')[0].getElementsByTagName('url');
            const titles = xhr.responseXML.getElementsByTagName('images')[0].getElementsByTagName('title');

            for (let i = 0; i < images.length; i++) {
                imageUrls.push(images[i].textContent.trim());
                imageDescriptions.push(titles[i].textContent.trim());
            }

            displayImage(currentIndex);

            const prevBtn = document.getElementById('prevBtn');
            const nextBtn = document.getElementById('nextBtn');

            prevBtn.addEventListener('click', function() {
                currentIndex = (currentIndex - 1 + imageUrls.length) % imageUrls.length;
                displayImage(currentIndex);
            });

            nextBtn.addEventListener('click', function() {
                currentIndex = (currentIndex + 1) % imageUrls.length;
                displayImage(currentIndex);
            });

        } else {
            console.error("Erreur lors de la récupération du fichier XML.");
        }
    };
    xhr.send();

    function displayImage(index) {
        const img = document.getElementById('slider-image');
        const description = document.getElementById('slider-description');
        img.src = imageUrls[index]; 
        description.textContent = imageDescriptions[index];
    }
};