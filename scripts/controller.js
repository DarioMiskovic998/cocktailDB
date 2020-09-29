//Controller
const Ctrl = (function (model, view) {
  //Get DOM Object from View Ctrl
  const domElements = view.domElements;

  //Events
  domElements.form.addEventListener("submit", getInput);
  domElements.container.addEventListener("click", ShowList);
  domElements.container.addEventListener("click", goBack);

  // function for insert API results in DOM
  function showCocktails(cocktail) {
      
    
      let div = document.createElement("div");
      div.classList = "card";
      let html = `
    <div class="cocktail-img">
      <img src="${cocktail.strDrinkThumb}" id="posterInfo" data-id=${cocktail.idDrink} />
    </div>
        <h2>${cocktail.strDrink}</h2>
       
    `;
      div.innerHTML = html;
      domElements.container.insertAdjacentElement("beforeend", div);
  }

  let saveInput;

  function getInput(e) {
    e.preventDefault();
    view.cleanContainer();

    saveInput = domElements.cocktailInput.value;
    let cocktails = model.searchCocktail(saveInput);

    cocktails.then((cocktail) => {
      const cocktailArr = cocktail.data.drinks;
      cocktailArr.forEach((item) => showCocktails(item));
    });

  }

  function cardInfo(arr) {
    let id = sessionStorage.getItem("cocktailId"); 

    // let id = view.loadinfoID();

    model.searchById(id).then((item) => {
      const cocktail = item.data.drinks[0];

      let ingredients = '';

      for (let i = 0; i < 15; i++) {
        cocktail[`strIngredient${i}`] ? ingredients +=  cocktail[`strIngredient${i}`]+' / ': false;
      }

      const output = `
      <div class="container-info">
      <div class='child-info'>
          <div class="info-card">
          <div class="poster" data-id=${cocktail.idDrink}><img src="${
        cocktail.strDrinkThumb
      }" /></div>

          <div class="info-cocktail">
            <div class="info-heading">
              <h2>${cocktail.strDrink}</h2>
              <a href="#" id="favorite"><img src="#" class=${addClassFav(
                arr,
                id
              )}></a>
            </div>
              <ul>
                <li>Type: ${cocktail.strAlcoholic}</li>
                <li>Ingredients: ${ingredients} </li>
                <li>Ingredients: ${cocktail.strInstructions} </li>
                <li><a href="#" id="nazad">Nazad</a></li>

              </ul>
            </div>
        
          </div>
         
          <div>
      </div>
      `;
      domElements.container.insertAdjacentHTML("afterbegin", output);
    });
  }

  //event for container
  function ShowList(e) {
    if (e.target.dataset.id) {
      sessionStorage.setItem("cocktailId", e.target.dataset.id);
    }
  }

  //add class to favorite's content
  function addClassFav(arr, id) {
    clasName = "";
    arr.indexOf(id) > -1 ? (clasName = "liked") : (clasName = "unliked");
    return clasName;
  }

  function updateFavorite(id) {
    model.updateFavoritePage(id, showCocktails);
    
  }

  //Go back btn
  function goBack(e) {
    if (e.target.id === "nazad") {
      //reload the page

      document.querySelector(".container-info").remove();
    } else {
      return false;
    }
  }

  return {
    cardInfo,
    updateFavorite,
    addClassFav,
  };
})(Model, View);
