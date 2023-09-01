// SPDX-License-Identifier: MIT
pragma solidity ^0.8.9;

import "https://cdn.jsdelivr.net/npm/@openzeppelin/contracts/token/ERC721/ERC721.sol";
import "https://cdn.jsdelivr.net/npm/@openzeppelin/contracts/utils/Strings.sol";
import "https://cdn.jsdelivr.net/npm/@openzeppelin/contracts/utils/Counters.sol";

contract MyToken is ERC721 {
    using Strings for uint256;
    using Counters for Counters.Counter;
    Counters.Counter private _tokenIds;

    struct NFTData {
        string name;
        string description;
        string imageURL;
    }

    mapping(uint256 => NFTData) private _tokenData;

    constructor() ERC721("MyToken", "MTK") {}

    function mintWithNFTData(address to, string memory name, string memory description, string memory imageURL) public {
        _tokenIds.increment();
        uint256 newTokenId = _tokenIds.current();
        
        _mint(to, newTokenId);
        _tokenData[newTokenId] = NFTData(name, description, imageURL);
    }

    function tokenURI(uint256 tokenId) public view override returns (string memory) {
        string memory baseURI = _baseURI();
        NFTData memory nftData = _tokenData[tokenId];

        string memory json = string(abi.encodePacked(
            '{"name": "', nftData.name, '", ',
            '"description": "', nftData.description, '", ',
            '"image": "', nftData.imageURL, '"}'
        ));

        return bytes(baseURI).length > 0 ? string(abi.encodePacked(baseURI, tokenId.toString())) : json;
    }

    // Exemplo de chamada da função mintWithNFTData no bloco principal
    function createNFTWithData() public {
        string memory name = "Myxx NFT";
        string memory description = "A custom NFT with extra data";
        string memory imageURL = "https://myxnft.com.br/token/ded7cc4f77c93c772c9f8e92b19d6bab";
        mintWithNFTData(msg.sender, name, description, imageURL);
    }
}

