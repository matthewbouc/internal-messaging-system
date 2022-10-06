import React, {useEffect, useState} from 'react';
import axios from "axios";
import {createTheme, ThemeProvider} from "@mui/material";
import {BrowserRouter, Route, Routes} from "react-router-dom";

import './App.css';
import ThemeForm from "./components/ThemeForm";
import Home from "./components/Home";
import NavigationBar from "./components/NavigationBar";
import TeamChat from "./components/TeamChat";


function App() {

    const [primary, setPrimary] = useState("#fff");
    const [secondary, setSecondary] = useState("#fff");

    useEffect(() => {
        axios.get("http://localhost:8000/api/userSettings")
            .then((response) => {
                console.log('get response, color1: ' + response.data.color1);
                setPrimary(response.data.color1);
                setSecondary(response.data.color2);
            })
            .catch((error) => {
                console.log(error);
            });
    }, []);

    const themeObject = {
        palette: {
            primary: {
                //lighter green for primary buttons
                main: primary,
            },
            secondary: {
                //darker green for nav bar or secondary buttons
                main: secondary,
            },
        },
    };


    const themeConfig = createTheme(themeObject);

    return (
      <ThemeProvider theme={themeConfig}>
          <BrowserRouter>
              <NavigationBar />
              <Routes>
                  <Route path="/" element={<Home />} />
                  <Route path="/teamchat" element={<TeamChat />} />
                  <Route path="/form" element={<ThemeForm setSecondary={setSecondary} secondary={secondary} setPrimary={setPrimary} primary={primary} />} />
              </Routes>
          </BrowserRouter>
      </ThemeProvider>
    );
}

export default App;
