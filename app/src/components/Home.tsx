import React, {useEffect} from 'react';
import axios from "axios";

import Box from '@mui/material/Box';


const Home = () => {

    useEffect(() => {
        testGetSuccessMessage();
    }, []);

    const testGetSuccessMessage = () => {
        axios.get('http://localhost:8000/log/success')
            .then(function (response) {
                console.log(response);
            })
            .catch(function (error) {
                console.log(error);
            })
    }
    return (
        <Box>
            <p>Dashboard</p>
        </Box>
    )
}

export default Home;
