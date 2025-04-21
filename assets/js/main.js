document.addEventListener("DOMContentLoaded", () => {
  const ratings = [93, 90, 30, 5, 1];
  const progressBars = document.querySelectorAll(".progress-bar");

  ratings.forEach((rating, index) => {
    progressBars[index].style.width = `${rating}% `;
    progressBars[index].setAttribute("aria-valuenow", rating);
    progressBars[index].parentElement.previousElementSibling.querySelector(
      ".val"
    ).textContent = ` ${rating}%  `;
  });

  const countersEl = document.querySelectorAll(".numbers");
  countersEl.forEach((counters) => {
    counters.textContent = 0;

    increamentCounters();

    function increamentCounters() {
      let currentNum = +counters.textContent;
      const dataCeil = counters.getAttribute("data-ceil");

      const increament = dataCeil / 25;

      currentNum = Math.ceil(currentNum + increament);

      if (currentNum < dataCeil) {
        counters.textContent = currentNum;
        setTimeout(increamentCounters, 30);
      } else {
        counters.textContent = dataCeil;
      }
    }
  });
});

document.addEventListener("DOMContentLoaded", () => {
  const hearts = document.querySelectorAll(".heart");
  const eatList = JSON.parse(localStorage.getItem("eatList")) || [];

  hearts.forEach((heart) => {
    const itemId = heart.dataset.id;

    if (eatList.includes(itemId)) {
      heart.classList.add("filled");
    }

    heart.addEventListener("click", () => {
      if (loggedin) {
        heart.classList.toggle("filled");
        if (heart.classList.contains("filled")) {
          if (!eatList.includes(itemId)) {
            eatList.push(itemId);

            $.ajax({
              url: "/cafe_management_system/partial/_manageEatList.php",
              type: "POST",
              data: {
                action: "add",
                food_id: itemId,
                user_id: userId,
              },
              success: function (response) {
                console.log(response);
              },
              error: function (error) {
                console.error("Error adding to eatlist:", error);
              },
            });
          }
        } else {
          const index = eatList.indexOf(itemId);
          if (index > -1) {
            eatList.splice(index, 1);

            $.ajax({
              url: "/cafe_management_system/partial/_manageEatList.php",
              type: "POST",
              data: {
                action: "remove",
                food_id: itemId,
                user_id: userId,
              },
              success: function (response) {
                console.log(response);
              },
              error: function (error) {
                console.error("Error removing from eatlist:", error);
              },
            });
          }
        }
      } else {
        $("#loginModal").modal("show");
      }
      localStorage.setItem("eatList", JSON.stringify(eatList));
    });
  });
});

const header = document.querySelector("nav");

window.addEventListener("scroll", () => {
  if (document.documentElement.scrollTop > 40) {
    header.classList.add("sticky");
  } else {
    header.classList.remove("sticky");
  }
  console.log(document.documentElement.scrollTop);
});

document.addEventListener("DOMContentLoaded", () => {});
