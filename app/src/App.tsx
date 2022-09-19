import React, {useEffect, useState} from 'react';
import './App.css';
import {createTheme, ThemeProvider} from "@mui/material";

import {BrowserRouter, Route, Routes} from "react-router-dom";
import ThemeForm from "./components/ThemeForm";
import Home from "./components/Home";


function App() {

    const [primary, setPrimary] = useState("#ACC8AB");
    const [secondary, setSecondary] = useState("#4B6F44");

    const themeObject = {
        palette: {
            primary: {
                //lighter green for primary buttons
                main: primary || "#ACC8AB",
            },
            secondary: {
                //darker green for nav bar or secondary buttons
                main: secondary || "#4B6F44",
            },
        },
    };


    const themeConfig = createTheme(themeObject);

    return (
      <ThemeProvider theme={themeConfig}>
          <BrowserRouter>
              <Routes>
                  <Route path="/" element={<Home />} />
                  <Route path="/form" element={<ThemeForm setSecondary={setSecondary} secondary={secondary} setPrimary={setPrimary} primary={primary} />} />
              </Routes>
          </BrowserRouter>
      </ThemeProvider>
    );
}

export default App;
