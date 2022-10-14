import React, {useEffect, useState} from "react";
import axios from "axios";
import {Accordion} from "@mui/material";
import Typography from "@mui/material/Typography";

export interface Message {
    groupId: number,
    message: string,
    createdAt: string,
    status: string,
    messageId: number,
}

const GroupMessages = (): JSX.Element => {

    const nothingHere:Array<Message> = [
        {
            'groupId': 0,
            'message': 'test',
            'createdAt': '1/1/1',
            'status': 'active',
            'messageId': 0,
        }
    ];

    const [tempMessages, setTempMessages] = useState(nothingHere);

    useEffect(() => {
        axios.get("http://localhost:8000/api/userGroupsMessages/1")
            .then((response) => {
                console.log(response.data);
                setTempMessages( response.data );
                console.log('get response, teamchat: ');
                console.log(tempMessages);
            })
            .catch((error) => {
                console.log(error);
            });

    }, []);


    return (
        <div>
            {tempMessages.map((message:Message, i:number) => {
                return (
                    <Accordion key={i}>
                        <Typography>
                            <p>Group Message: {message.message} </p>
                        </Typography>
                    </Accordion>
                )
            }) }
            <div>
                <p> GroupMessages page </p>
            </div>
        </div>
    )
};

export default GroupMessages;