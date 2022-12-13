import * as S from "../FeedView/style";
import Header from "../../Components/Header";
import { useNavigate } from "react-router-dom";
import SideBar from "../../Components/SideBar";


const Feed = () => {
  const navigate = useNavigate();
  return (
    <div
      style={{
        backgroundColor: "#eeeeee",
        height: "100vh",
        display: "flex",
        justifyContent: "center",
      }}
    > 
    
    
    <SideBar active={true}/>
    
      <S.Background>
        <S.FeedInside>
        <S.Title>Feed</S.Title>
        </S.FeedInside>
      </S.Background>
    </div>
  );
};

export default Feed;