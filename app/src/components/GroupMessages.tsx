import React from "react";
import {Grid, ListItem} from "@mui/material";
import {useAppDispatch} from "../hooks";
import {MessageState} from "../reducers/messageSlice";
import {useGetMessagesQuery} from "../services/groupMessages";
import Container from "@mui/material/Container";
import ListItemText from '@mui/material/ListItemText';


export interface Props {
    groupId: number
}

const GroupMessages = (props: Props): JSX.Element => {

    const dispatch = useAppDispatch();
    const {data, isLoading, error} = useGetMessagesQuery(props.groupId);

    const blueOrGreenMessage = (message: MessageState) => {
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
                        <ListItemText>Author ID: {message.author}</ListItemText>
                    </Container>
                    <Container>
                        <ListItemText>{message.message}</ListItemText>
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
            {data?.messages.map((message, i: number) => {
                return (
                    <ListItem key={i}>
                        {blueOrGreenMessage(message)}
                    </ListItem>
                )
            })}
        </Container>
    )
};

export default GroupMessages;