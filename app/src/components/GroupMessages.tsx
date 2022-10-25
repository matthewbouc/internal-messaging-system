import React from "react";
import {Grid, ListItem} from "@mui/material";
import {useAppDispatch} from "../hooks";
import {MessageState} from "../reducers/messageSlice";
import {useGetMessagesQuery} from "../services/groupMessages";
import Container from "@mui/material/Container";
import ListItemText from '@mui/material/ListItemText';
import Typography from "@mui/material/Typography";


export interface Props {
    groupId: number
}

const GroupMessages = (props: Props): JSX.Element => {

    const dispatch = useAppDispatch();
    const {data, isLoading, error} = useGetMessagesQuery(props.groupId);

    const blueOrGreenMessage = (message: MessageState) => {
        if (message.authorId === 1) {
            return (
                <Grid container>
                    {/*<Grid item xs={7}></Grid>*/}
                    {/*<Grid item xs={5} justifyContent="flex-start">*/}
                    {/*    <Typography >Author ID: {message.author}</Typography>*/}
                    {/*</Grid>*/}
                    <Grid item xs={5}></Grid>
                    <Grid container item xs={7} justifyContent="flex-end" sx={{backgroundColor: '#d5d5d5'}}>
                        <Typography >{message.message}</Typography>
                    </Grid>
                    <Grid item xs={5}></Grid>
                    <Grid container item xs={7} justifyContent="flex-end" sx={{backgroundColor: '#d5d5d5'}}>
                        <Typography variant="caption" >{message.createdAt}</Typography>
                    </Grid>
                </Grid>
            )
        } else {
            return (
                <Grid container>
                    <Grid item xs={6}>
                        <Typography variant="caption">{message.authorFirstName} {message.authorLastName}</Typography>
                    </Grid>
                    <Grid item xs={6}></Grid>
                    <Grid item xs={7} sx={{backgroundColor: 'lightblue'}}>
                        <Typography>{message.message}</Typography>
                    </Grid>
                    <Grid item xs={5}></Grid>
                    <Grid item xs={7} sx={{backgroundColor: 'lightblue'}}>
                        <Typography variant="caption">{message.createdAt}</Typography>
                    </Grid>
                    <Grid item xs={5}></Grid>
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