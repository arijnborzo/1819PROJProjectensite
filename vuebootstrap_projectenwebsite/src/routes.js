import LoginForm from "./components/Login/LoginForm";
import Home from "./components/Overzicht/Overzicht";
import Studenten from "./components/Studenten/Studenten";
import Archief from "./components/Archief/Archief";
import Belbintest from "./components/Belbintest/Belbintest";
import Nieuwproject from "./components/NieuwProject/NieuwProject";

export const routes = [
  { path: "", component: LoginForm },
  { path: "/home", component: Home },
  { path: "/login", component: LoginForm },
  { path: "/studenten", component: Studenten },
  { path: "/archief", component: Archief },
  { path: "/belbintest", component: Belbintest },
  { path: "/nieuwproject", component: Nieuwproject },
  { path: "/redirect", redirect: { name: "LoginForm" } },
  { path: "*", redirect: { path: "/" } }
];
