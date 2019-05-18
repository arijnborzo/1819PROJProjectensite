import LoginForm from "./components/Login/Login";
import Home from "./components/Overzicht/Overzicht";
import Studenten from "./components/Studenten/Studenten";
import Archief from "./components/Archief/Archief";
import Belbintest from "./components/Belbintest/Belbintest";
import NieuwProject from "./components/NieuwProject/NieuwProject";
import MijnProject from "./components/MijnProject/MijnProject";
import DetailProject from "./components/MijnProject/DetailProject";
import Registreer from "./components/Registreer/Registreren";
import PaswoordVergeten from "./components/PaswoordVergeten/PaswoordVergeten";

export const routes = [
  { path: "", component: LoginForm },
  {
    path: "/home",
    component: Home,
    props: {
      projects: {
        project1: {
          title: "Projectensite",
          short_description:
            "Hey baby girl what you doin tonight I wanna see what you got in store Ha hey baby, givin' it you all when you're dancin' on me",
          name: "Andreas",
          surname: "Lauwers",
          status: "Accepted",
          group_id: 1
        },
        project2: {
          title: "Projectensite",
          short_description:
            "Hey baby girl what you doin tonight I wanna see what you got in store Ha hey baby, givin' it you all when you're dancin' on me",
          name: "Lukas",
          surname: "Petit",
          status: "Accepted",
          group_id: 1
        },
        project3: {
          title: "MacroKeyboard",
          short_description:
            "Hey baby girl what you doin tonight I wanna see what you got in store Ha hey baby, givin' it you all when you're dancin' on me",
          name: "Arno",
          surname: "Stas",
          status: "Declined",
          group_id: 2
        },
        project4: {
          title: "MacroKeyboard",
          short_description:
            "Hey baby girl what you doin tonight I wanna see what you got in store Ha hey baby, givin' it you all when you're dancin' on me",
          name: "Pol",
          surname: "Lol",
          status: "Declined",
          group_id: 2
        }
      }
    }
  },
  { path: "/login", component: LoginForm },
  {
    path: "/studenten",
    component: Studenten,
    props: {
      students: {
        stud1: {
          name: "Arno",
          surname: "Stas",
          group_id: 1,
          projectvoorstel: "Projectenwebsite",
          belbin: "Plant"
        },
        stud2: {
          name: "Lukas",
          surname: "Petit",
          group_id: 1,
          projectvoorstel: "Projectenwebsite",
          belbin: "Completor"
        },
        stud3: {
          name: "Andreas",
          surname: "Lauwers",
          group_id: 1,
          projectvoorstel: "Projectenwebsite",
          belbin: "Groepswerker"
        },
        stud4: {
          name: "Arijn",
          surname: "Borzo",
          group_id: 1,
          projectvoorstel: "Projectenwebsite",
          belbin: "Coordinator"
        },
        stud5: {
          name: "Jonas",
          surname: "Petit",
          group_id: 2,
          projectvoorstel: "Macro Keyboard",
          belbin: "Implementor"
        },
        stud6: {
          name: "Elias",
          surname: "Petit",
          group_id: 2,
          projectvoorstel: "Macro Keyboard",
          belbin: "Vormer"
        },
        stud7: {
          name: "Tom",
          surname: "Petit",
          group_id: 3,
          projectvoorstel: "",
          belbin: "Completor"
        }
      }
    }
  },
  { path: "/archief", component: Archief },
  { path: "/belbintest", component: Belbintest },
  { path: "/nieuwproject", component: NieuwProject },
  {
    path: "/mijnproject",
    component: MijnProject,
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
      groepsleden: {
        "Arno Stas": "implementor",
        "Andreas Lauwers": "coordinator",
        "Lukas Petit": "plant",
        "Arijn Borzo": "implementor"
      }
    }
  },
  {
    path: "/project/:titel",
    name: "detailproject",
    component: DetailProject,
    props: true
  },
  { path: "/registreer", component: Registreer },
  { path: "/paswoordvergeten", component: PaswoordVergeten },
  { path: "/redirect", redirect: { name: "LoginForm" } },
  { path: "*", redirect: { path: "/" } }
];
