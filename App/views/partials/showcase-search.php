  <!-- Showcase -->
  <!-- <section
      class="showcase relative bg-cover bg-center bg-no-repeat h-72 flex items-center"
    >
      <div class="overlay"></div>
      <div class="container mx-auto text-center z-10">
        <h2 class="text-4xl text-white font-bold mb-4"> </h2>
        <form class="mb-4 block mx-5 md:mx-auto">
          <input
            type="text"
            name="keywords"
            placeholder="Keywords"
            class="w-full md:w-auto mb-2 px-4 py-2 focus:outline-none"
          />
          <input
            type="text"
            name="location"
            placeholder="Location"
            class="w-full md:w-auto mb-2 px-4 py-2 focus:outline-none"
          />
          <button
            class="w-full md:w-auto bg-green-500 hover:bg-green-500 text-white px-4 py-2 focus:outline-none"
          >
          <i class="fa fa-search"></i> Search
          </button>
        </form>
      </div>
    </section> -->

    <style>
    .containerimg {
        display: flex;
        gap: 10rem;
        align-items: center;
        flex-wrap: wrap; /* Allows wrapping to new lines if needed */
        padding: 1rem; /* Adds some padding for smaller screens */
    }

    .text {
        font-size: 2rem;
        text-align: center; /* Centers the text for better readability */
    }

    /* Media Queries for Different Screen Sizes */

    /* Small screens (phones) */
    @media (max-width: 600px) {
        .containerimg {
            gap: 2rem; /* Reduces gap for smaller screens */
            flex-direction: column; /* Stacks items vertically */
            text-align: center; /* Centers the text */
            align-items: center;
            justify-content: center;
        }

        .text {
            font-size: 1.5rem; /* Reduces font size for smaller screens */
        }
    }

    /* Medium screens (tablets) */
    @media (min-width: 601px) and (max-width: 1024px) {
        .containerimg {
            gap: 5rem; /* Moderate gap for tablets */
            align-items: center;
            justify-content: center;
        }

        .text {
            font-size: 1.8rem; /* Slightly smaller font size for tablets */
        }
    }

    /* Large screens (desktops) */
    @media (min-width: 1024px) {
        .containerimg {
            gap: 5rem; /* Maintains the original gap for larger screens */
            flex-wrap:nowrap;
        } 

        .text {
            font-size: 2rem; /* Original font size */
        }
    }
</style>



<section>
<div class="containerimg">
<img src="/images/showre.png" alt="Showre Image">

<div class="text">  <h2><b>Unlock Your Career Potential</h2></b> <br/> 
<h4>Find the Ideal Job Opportunity for You.</h4>
</div>

</div>


</section>

  