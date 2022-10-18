import React, {PropsWithChildren, useEffect, useState} from "react";
import axios from "axios";
import {Accordion, Grid, List, ListItem } from "@mui/material";
import Typography from "@mui/material/Typography";
import {TestProps} from "./Test";
import {useAppDispatch, useAppSelector} from "../hooks";
import {MessageState, updateMessages} from "../reducers/messageSlice";
import { useGetMessagesQuery } from "../services/groupMessages";
import {useGetGroupQuery} from "../services/teamChat";
import ReplyTextBox from "./ReplyTextBox";
import Box from "@mui/material/Box";
import Container from "@mui/material/Container";
import ListItemText from '@mui/material/ListItemText';


// export interface Message {
//     groupId: number,
//     message: string,
//     createdAt: string,
//     status: string,
//     messageId: number,
// }

export interface Props {
    groupId: number
}



const GroupMessages = (props:Props): JSX.Element => {

    const dispatch = useAppDispatch();
    // const messages = useAppSelector(state=>state.messages);
    const { data, isLoading, error } = useGetMessagesQuery(props.groupId);


    // const nothingHere:Array<Message> = [
    //     {
    //         'groupId': 0,
    //         'message': 'test',
    //         'createdAt': '1/1/1',
    //         'status': 'active',
    //         'messageId': 0,
    //     }
    // ];

    // const [tempMessages, setTempMessages] = useState(nothingHere);
    //
    // useEffect(() => {
    //     console.log(`prop being passed to GroupMessages component = ${props.groupId}`);
    //     axios.get(`http://localhost:8000/api/groupMessages/${props.groupId}`)
    //         .then((response) => {
    //             console.log('useeffect in GroupMessages: response.data is ');
    //             console.log( response.data);
    //             // setTempMessages( tempMessages );
    //             dispatch(updateMessages(response.data));
    //             // console.log('tempMessages after setTempMessages in GroupMessages: ');
    //             // console.log(tempMessages);
    //             console.log('!!!! Here is messages.messages');
    //             console.log(data);
    //         })
    //         .catch((error) => {
    //             console.log(error);
    //         });
    //
    // }, []);

    const blueOrGreenMessage = (message:MessageState) => {
        if (message.author === 1) {
            return (
                <Grid container justifyContent="flex-end">
                <Grid item xs={12}>
                    <ListItemText sx={{align: 'right'}}>Author ID: {message.author}</ListItemText>
                </Grid>
                <Grid item xs={12}>
                    <ListItemText sx={{align: 'right'}}>{message.message}</ListItemText>
                </Grid>
                <Grid item xs={12}>
                    <ListItemText sx={{align: 'right'}}>{message.createdAt}</ListItemText>
                </Grid>
            </Grid>
            )
        } else {
            return (
                <Grid container justifyContent="flex-start">
                    <Container>
                        <ListItemText >Author ID: {message.author}</ListItemText>
                    </Container>
                    <Container>
                        <ListItemText >{message.message}</ListItemText>
                    </Container>
                    <Container>
                        <ListItemText sx={{align: 'left'}}>{message.createdAt}</ListItemText>
                    </Container>
                </Grid>

            )
        }

    }

    if (isLoading) return <div>Is Loading...</div>;
    if (error) return <div> Something went wrong </div>;
    return (
            <Container>
                {data?.messages.map((message, i:number) => {
                    return (
                            <ListItem key={i}>
                                {blueOrGreenMessage (message)}
                            </ListItem>
                    )
                })}
                <ReplyTextBox groupId={props.groupId} />
            </Container>
    )
};

export default GroupMessages;