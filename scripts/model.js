//Model Crl
const Model = (function () {
  async function searchCocktail(q) {
    return await axios.get(
      `https://www.thecocktaildb.com/api/json/v1/1/search.php?s=${q}`
    );
  }

  // //Search by ID
  async function searchById(id) {
    const res = await axios.get(
      `https://www.thecocktaildb.com/api/json/v1/1/lookup.php?i=${id}`
    );
    return await res;
  }

  function updateFavoritePage(cocktailID, cb) {
    searchById(cocktailID).then((item) => {
      cb(item.data.drinks[0]);
    });
  }

  return {
    searchCocktail,
    searchById,
    updateFavoritePage,
  };
})();
