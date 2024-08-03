const totalItems = 30; // Total number of card elements
const itemsPerPage = 6; // Number of card elements per page
const totalPages = Math.ceil(totalItems / itemsPerPage);

function generateCards(pageNumber) {
  const listVideo = document.getElementById("list-vidio");
  listVideo.innerHTML = "";

  const startIndex = (pageNumber - 1) * itemsPerPage;
  const endIndex = Math.min(startIndex + itemsPerPage, totalItems);

  for (let i = startIndex; i < endIndex; i++) {
    const card = document.createElement("div");
    card.className = "vidio1";

    const thumbnail = document.createElement("img");
    thumbnail.src = `dist/img/Vidio/vidio${i + 1}.png`;
    card.appendChild(thumbnail);

    const textDesk = document.createElement("div");
    textDesk.className = "text-desk";

    const paragraph = document.createElement("p");
    paragraph.className = "semibold-heading6";
    paragraph.textContent = `Konsumen Dikeroyok Tukang Parkir, Begini Aturan Parkir di Alfamidi dan Alfamart`;
    textDesk.appendChild(paragraph);
    card.appendChild(textDesk);

    listVideo.appendChild(card);
  }
}

function createPaginationButtons() {
  const paginationContainer = document.getElementById("pagination-container");
  const pagination = document.createElement("div");
  pagination.className = "pagination";

  for (let i = 1; i <= totalPages; i++) {
    const button = document.createElement("li");
    button.classList = "page-item";
    button.classList.add("current-page");

    const buttonLabel = document.createElement("p");
    buttonLabel.className = "bold-heading5";
    buttonLabel.textContent = i;
    button.appendChild(buttonLabel);

    button.addEventListener("click", function () {
      generateCards(i);
    });
    pagination.appendChild(button);
  }

  paginationContainer.appendChild(pagination);
}

// Generate initial page and pagination buttons
generateCards(1);
createPaginationButtons();
