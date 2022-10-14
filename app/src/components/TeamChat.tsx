import React, {useEffect, useState} from "react";
import axios from "axios";
import {Accordion} from "@mui/material";
import Typography from "@mui/material/Typography";
import GroupMessages from "./GroupMessages";

export interface Message {
    groupId: number,
    message: string,
    createdAt: string,
    status: string,
    messageId: number,
}

export interface Group {
    groupId: number,
    groupName: string,
    notifications: number,
    userGroupId: number,
}

const TeamChat = (): JSX.Element => {



    const groupHolder:Array<Group> = [
        {
            'groupId': 0,
            'groupName': 'Test',
            'notifications': 0,
            'userGroupId': 0,
        }
    ];


    const [tempGroups, setTempGroups] = useState(groupHolder);


    useEffect(() => {

        axios.get("http://localhost:8000/api/userGroups/1")
            .then((response) => {
                console.log(response.data);
                setTempGroups( response.data );
                console.log('get response, tempGroups: ');
                console.log(tempGroups);
            })
            .catch((error) => {
                console.log(error);
            });
    }, []);


    return (
        <div>

            {tempGroups.map((group:Group, i:number) => {
                return (
                    <Accordion key={i}>
                        <Typography>
                            <p>Group Name: {group.groupName} </p>
                            <GroupMessages />
                        </Typography>
                    </Accordion>
                )
            }) }
            <div>
                <p> TeamChat page </p>
            </div>
        </div>
    )
};

export default TeamChat;