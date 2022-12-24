import * as S from "../FeedView/style";
import Header from "../../Components/Header";
import { useNavigate } from "react-router-dom";
import SideBar from "../../Components/SideBar";
import { 
  FaBook,
} from 'react-icons/fa'


const Profile = () => {
  const navigate = useNavigate();
  return (
   
    <div
      style={{
        backgroundColor: "#eeeeee",
        height: "auto",
        display: "flex",
        justifyContent: "center",
      }}
    > 
    
    
      <SideBar active={true}/>
      <S.Background>
        <S.FeedInside>
          
          <S.Container>
            <S.FilterButton>Icon</S.FilterButton>
          </S.Container>


          <S.Container>
            <S.FilterButton>All</S.FilterButton>
            <S.FilterButton>Reviews</S.FilterButton>
            <S.FilterButton>Quotes</S.FilterButton>
          </S.Container>
          <S.Title>Feed</S.Title>

          <S.Card>
            <S.CardUsername>@hagridlover</S.CardUsername>
            <S.CardIn>
              <S.CardRating>5/5 Points</S.CardRating>
              <S.CardReviewTitle>Amazing!!!</S.CardReviewTitle>
              <S.CardReview>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed rhoncus vulputate sapien. Sed sodales est erat, sit amet euismod dolor cursus sit amet. In vitae eleifend mi, ut congue ex. Nullam vitae turpis eu massa auctor dignissim non sit amet diam. Maecenas placerat est et convallis consequat.</S.CardReview>
              <S.CardBookContainer> 
                <FaBook/>  
                <S.CardBookNameAuthor>
                  <S.CardBookName>Harry Potter and the Philosopher’s Stone</S.CardBookName>
                  <S.CardBookAuthor>J. K. Rowling</S.CardBookAuthor>
                </S.CardBookNameAuthor>
              </S.CardBookContainer>
            </S.CardIn>
          </S.Card>

          <S.Card>
            <S.CardUsername>@hagridlover</S.CardUsername>
            <S.CardIn>
              <S.CardRating>5/5 Points</S.CardRating>
              <S.CardReviewTitle>Amazing!!!</S.CardReviewTitle>
              <S.CardReview>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed rhoncus vulputate sapien. Sed sodales est erat, sit amet euismod dolor cursus sit amet. In vitae eleifend mi, ut congue ex. Nullam vitae turpis eu massa auctor dignissim non sit amet diam. Maecenas placerat est et convallis consequat.</S.CardReview>
              <S.CardBookContainer> 
                <FaBook/>  
                <S.CardBookNameAuthor>
                  <S.CardBookName>Harry Potter and the Philosopher’s Stone</S.CardBookName>
                  <S.CardBookAuthor>J. K. Rowling</S.CardBookAuthor>
                </S.CardBookNameAuthor>
              </S.CardBookContainer>
            </S.CardIn>
          </S.Card>

          <S.Card>
            <S.CardUsername>@hagridlover</S.CardUsername>
            <S.CardIn>
              <S.CardRating>5/5 Points</S.CardRating>
              <S.CardReviewTitle>Amazing!!!</S.CardReviewTitle>
              <S.CardReview>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed rhoncus vulputate sapien. Sed sodales est erat, sit amet euismod dolor cursus sit amet. In vitae eleifend mi, ut congue ex. Nullam vitae turpis eu massa auctor dignissim non sit amet diam. Maecenas placerat est et convallis consequat.</S.CardReview>
              <S.CardBookContainer> 
                <FaBook/>  
                <S.CardBookNameAuthor>
                  <S.CardBookName>Harry Potter and the Philosopher’s Stone</S.CardBookName>
                  <S.CardBookAuthor>J. K. Rowling</S.CardBookAuthor>
                </S.CardBookNameAuthor>
              </S.CardBookContainer>
            </S.CardIn>
          </S.Card>
          
        </S.FeedInside>
      </S.Background>
    </div>
  );
};

export default Profile;