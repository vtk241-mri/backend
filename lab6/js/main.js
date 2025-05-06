document
  .getElementById("registerForm")
  .addEventListener("submit", async function (e) {
    e.preventDefault();
    const formData = new FormData(this);
    const data = Object.fromEntries(formData.entries());

    if (
      !data.name ||
      !data.email ||
      !data.password ||
      data.password.length < 6
    ) {
      alert("Всі поля обов'язкові. Мінімальна довжина пароля — 6.");
      return;
    }

    const response = await fetch("register.php", {
      method: "POST",
      headers: { "Content-Type": "application/json" },
      body: JSON.stringify(data),
    });

    const result = await response.json();
    alert(result.message);
    if (result.success) loadUsers();
  });

document
  .getElementById("loginForm")
  .addEventListener("submit", async function (e) {
    e.preventDefault();
    const formData = new FormData(this);
    const data = Object.fromEntries(formData.entries());

    const res = await fetch("login.php", {
      method: "POST",
      headers: { "Content-Type": "application/json" },
      body: JSON.stringify(data),
    });

    const result = await res.json();

    const info = document.getElementById("loginInfo");
    if (result.success) {
      info.textContent = `Вітаємо, ${result.user.name}!`;
    } else {
      info.textContent = result.message;
    }
  });

async function loadUsers() {
  const res = await fetch("users.php");
  const users = await res.json();
  const ul = document.getElementById("userList");
  ul.innerHTML = "";

  users.forEach((user) => {
    const li = document.createElement("li");
    li.innerHTML = `${user.name} (${user.email})
          <button onclick="deleteUser(${user.id})">Видалити</button>
          <button onclick="editUser(${user.id}, '${user.name}', '${user.email}')">Редагувати</button>`;
    ul.appendChild(li);
  });
}

async function deleteUser(id) {
  if (confirm("Видалити цього користувача?")) {
    const res = await fetch("delete.php", {
      method: "POST",
      headers: { "Content-Type": "application/json" },
      body: JSON.stringify({ id }),
    });
    const result = await res.json();
    alert(result.message);
    loadUsers();
  }
}

function editUser(id, name, email) {
  const newName = prompt("Нове ім'я:", name);
  const newEmail = prompt("Новий email:", email);
  if (newName && newEmail) {
    fetch("edit.php", {
      method: "POST",
      headers: { "Content-Type": "application/json" },
      body: JSON.stringify({ id, name: newName, email: newEmail }),
    })
      .then((res) => res.json())
      .then((result) => {
        alert(result.message);
        loadUsers();
      });
  }
}
