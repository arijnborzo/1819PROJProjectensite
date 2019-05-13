import LoginForm from "./components/Login/Login";
import Home from "./components/Overzicht/Overzicht";
import Studenten from "./components/Studenten/Studenten";
import Archief from "./components/Archief/Archief";
import Belbintest from "./components/Belbintest/Belbintest";
import Nieuwproject from "./components/NieuwProject/NieuwProject";
import Mijnproject from "./components/NieuwProject/MijnProject";
import Registreer from "./components/Registreer/Registreren";
import PaswoordVergeten from "./components/PaswoordVergeten/PaswoordVergeten";

export const routes = [
  { path: "", component: LoginForm },
  { path: "/home", component: Home },
  { path: "/login", component: LoginForm },
  { path: "/studenten", component: Studenten },
  { path: "/archief", component: Archief },
  { path: "/belbintest", component: Belbintest },
  { path: "/nieuwproject", component: Nieuwproject },
  {
    path: "/mijnproject",
    component: Mijnproject,
    props: {
      titel: "Projectenwebsite",
      status: false,
      beschrijving:
        "Een platform voor projecten goed te keuren But why smiling man her imagine married. Chiefly can man her out believe manners cottage colonel unknown. Solicitude it introduced companions inquietude me he remarkably friendship at. My almost or horses period. Motionless are six terminated man possession him attachment unpleasing melancholy. Sir smile arose one share. No abroad in easily relied an whence lovers temper by. Looked wisdom common he an be giving length mr. ",
      hoofdvraag:
        "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc nisi ipsum, hendrerit eget feugiat vel, dignissim ac neque. Praesent egestas massa amet.?",
      nevenvragen: ["Waarom?", "Wie?", "Waar?", "Wanneer?"],
      smart: {
        specifiek:
          "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc nisi ipsum, hendrerit eget feugiat vel, dignissim ac neque.",
        meetbaar:
          "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc nisi ipsum, hendrerit eget feugiat vel, dignissim ac neque.",
        acceptabel: "Lorem ipsum dolor sit amet, consectetur adipiscing elit.",
        realistisch:
          "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc nisi ipsum, hendrerit eget feugiat vel, dignissim ac neque. Praesent egestas massa amet.",
        tijdsgebonden:
          "Lorem ipsum dolor sit amet, consectetur adipiscing elit. ."
      },
      groepsleden: ["Arno Stas", "Arno Stas", "Arno Stas", "Arno Stas"]
    }
  },
  
  { path: "/registreer", component: Registreer },
  { path: "/paswoordvergeten", component: PaswoordVergeten },
  { path: "/redirect", redirect: { name: "LoginForm" } },
  { path: "*", redirect: { path: "/" } }
];
