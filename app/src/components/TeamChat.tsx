import React, {useEffect, useState} from "react";
import axios from "axios";
import {Accordion} from "@mui/material";
import Typography from "@mui/material/Typography";



const TeamChat = (): JSX.Element => {

    const [companies, setCompanies] = useState(['']);

    useEffect(() => {
        axios.get("http://localhost:8000/api/companies")
            .then((response) => {
                setCompanies(['']);
                console.log('get response, teamchat: ');
                for (let item of response.data) {
                    console.log(item);
                    for (let key in item) {
                        console.log(item[key]);
                        setCompanies(companies => [...companies, item[key]]);
                    }
                }
            })
            .catch((error) => {
                console.log(error);
            });
    }, []);
    return (
        <div>
            {companies.map((company:string, i:number) => {
                return (
                    <Accordion key={i}>
                        <Typography>
                            {company}
                        </Typography>
                    </Accordion>
                )
            })}
            <div>
                <p> TeamChat page </p>
            </div>
        </div>
    )
};

export default TeamChat;