const page = window.location.href;

// Filter on products
if(page.endsWith('/product')) {
    const productCards = document.getElementsByClassName('productInfo'); 
    const minCostInput = document.getElementById('js--minCost');
    const maxCostInput = document.getElementById('js--maxCost');
    const categoryInput = document.getElementById('js--category');

    setProductFilter();

    minCostInput.addEventListener('input', filterProducts);
    maxCostInput.addEventListener('input', filterProducts);
    categoryInput.addEventListener('input', filterProducts);


    function setProductFilter() {
        let costs = Array();
        let categories = Array();

        for(i = 0; i < productCards.length; i++) {
            costs.push(parseInt(productCards[i].dataset.cost));
            if(!categories.includes(productCards[i].dataset.category)){
                categories.push(productCards[i].dataset.category);
            }
        }

        for(i = 0; i < categories.length; i++) {
            let option = document.createElement('option');
            option.text = categories[i];
            categoryInput.add(option);
        }
        
        let maxCost = Math.max.apply(null, costs);
        let minCost = Math.min.apply(null, costs);

        minCostInput.value = minCost;
        maxCostInput.value = maxCost;
    }

    function filterProducts() {
        for(i = 0; i < productCards.length; i++) {
            productCards[i].style.display = 'none';
            console.log(productCards[i].dataset.cost);


            if(categoryInput.value == productCards[i].dataset.category || categoryInput.value == 'Alles'){
                if(parseInt(minCostInput.value) <= parseInt(productCards[i].dataset.cost) && parseInt(maxCostInput.value) >= parseInt(productCards[i].dataset.cost)){
                    productCards[i].style.display = 'block';
                }
            }
        }
    }
}

// Section selection on account
if(page.endsWith('/account')) {
    const advertised = document.getElementById('js--advertisedSection');
    const lent = document.getElementById('js--lentSection');
    const rented = document.getElementById('js--rentedSection');
    const history = document.getElementById('js--historySection');
    const sectionText = document.getElementById('js--sectionText');

    advertised.style.display = 'block';
    lent.style.display = 'none';
    rented.style.display = 'none';
    history.style.display = 'none';

    function showSection(section) {
        advertised.style.display = 'none';
        lent.style.display = 'none';
        rented.style.display = 'none';
        history.style.display = 'none';

        switch(section) {
            case 0:
                advertised.style.display = 'block';
                sectionText.innerHTML = 'Geadverteerde Items'
                break;
            case 1:
                lent.style.display = 'block';
                sectionText.innerHTML = 'Verhuurde Items'
                break;
            case 2:
                rented.style.display = 'block';
                sectionText.innerHTML = 'Gehuurde Items'
                break;
            case 3:
                history.style.display = 'block';
                sectionText.innerHTML = 'Eerder geleende Items'
                break;
        }
    }
}

if(page.endsWith('/admin')) {
    const users = document.getElementById('js--userSection');
    const products = document.getElementById('js--productSection');
    const sectionText = document.getElementById('js--sectionText');


    users.style.display = 'block';
    products.style.display = 'none';

    function showSection(section) {
        if(section == 0) {
            users.style.display = 'block';
            products.style.display = 'none';
            sectionText.innerHTML = 'Gebruikers';
        } else {
            users.style.display = 'none';
            products.style.display = 'block';
            sectionText.innerHTML = 'Producten';
        }
    }
}