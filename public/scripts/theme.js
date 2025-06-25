function togglePreferredTheme() {
  if (document.body.getAttribute("data-theme") === "dark") {
    setTheme("light");
  } else {
    setTheme("dark");
  }
}

function setTheme(themeToSet) {
  document.body.setAttribute("data-theme", themeToSet);
  localStorage.setItem("theme", themeToSet);
}
