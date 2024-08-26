function createsidebar(activemenu) {
  const sidebar = document.createElement("aside");
  sidebar.classList.add("sidebar");

  const topDiv = document.createElement("div");
  topDiv.classList.add("top");

  const logoDiv = document.createElement("div");
  logoDiv.classList.add("logo");
  const logoImg = document.createElement("img");
  logoImg.src = global["site_logo"];
  logoImg.alt = global["site_name"];
  const logoHeading = document.createElement("h2");
  logoHeading.textContent = global["site_name"];
  logoDiv.appendChild(logoImg);
  logoDiv.appendChild(logoHeading);

  const closeBtnDiv = document.createElement("div");
  closeBtnDiv.id = "close-btn";
  closeBtnDiv.classList.add("close");
  const closeBtnSpan = document.createElement("span");
  closeBtnSpan.classList.add("material-symbols-rounded");
  closeBtnSpan.textContent = "close";
  closeBtnDiv.appendChild(closeBtnSpan);

  topDiv.appendChild(logoDiv);
  topDiv.appendChild(closeBtnDiv);

  const sidebarDiv = document.createElement("div");
  sidebarDiv.classList.add("sidebar");

  const links = [
    { href: "#", text: "Dashboard", icon: "dashboard" },
    { href: "orders.php", text: "Orders", icon: "assignment" },
    { href: "#", text: "Analytics", icon: "monitoring" },
    { href: "#", text: "Menu", icon: "restaurant" },
    { href: "#", text: "Items", icon: "grocery" },
    { href: "#", text: "Users", icon: "group" },
    { href: "#", text: "Settings", icon: "settings" },
  ];

  links.forEach((link) => {
    const anchor = document.createElement("a");
    anchor.href = link.href;
    if (link.text === activemenu) {
      anchor.classList.add("active");
    }
    const span = document.createElement("span");
    span.classList.add("material-symbols-rounded");
    span.textContent = link.icon;
    const heading = document.createElement("h3");
    heading.textContent = link.text;
    anchor.appendChild(span);
    anchor.appendChild(heading);
    sidebarDiv.appendChild(anchor);
  });

  sidebar.appendChild(topDiv);
  sidebar.appendChild(sidebarDiv);

  return sidebar;

  // Now you can append the sidebar to your document or any specific container.
  // For example:
  // document.body.appendChild(sidebar);
}
