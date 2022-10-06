import React, {useEffect} from 'react';
import { useNavigate } from 'react-router-dom';

import AppBar from '@mui/material/AppBar';
import Box from '@mui/material/Box';
import Toolbar from '@mui/material/Toolbar';
import Typography from '@mui/material/Typography';
import IconButton from '@mui/material/IconButton';
import MenuIcon from "@mui/icons-material/Menu";


const NavigationBar = () => {

    const navigate = useNavigate();

    return (
        <Box sx={{ flexGrow: 1 }}>
            <AppBar position="static">
                <Toolbar>
                    <a href="http://localhost:3000" >
                        <img alt="Kipsu" height="30" width="100" src="https://cdn.kipsu.com/apps/kipsu/release-2236v1_2dd0c75e7d93dbd46e4fc6737e0c6a4da24e5610/img/kipsu-watermark-compressed.png" />
                    </a>
                    <Typography variant="body1" component="div" sx={{ ml: 5 }} onClick={() => navigate("/")}>
                        Dashboard
                    </Typography>
                    <Typography variant="body1" component="div" sx={{ ml: 3 }} onClick={() => navigate("/teamchat")}>
                        TeamChat
                    </Typography>
                    <Typography variant="body1" component="div" sx={{ ml: 3, flexGrow: 1 }} onClick={() => navigate("/form")}>
                        User Settings
                    </Typography>
                    <IconButton
                        size="large"
                        edge="start"
                        color="inherit"
                        aria-label="menu"
                        sx={{ mr: 2 }}
                    >
                        <MenuIcon />
                    </IconButton>
                </Toolbar>
            </AppBar>
        </Box>
    );
}

export default NavigationBar;